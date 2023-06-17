<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;


class CheckoutController extends Controller
{
    public function showCheckoutForm(): View
    {
        return view('front.dashboard.cart.checkout_form');
    }

    public function checkout(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $card_no = $request->input('card_no');
        $expire_month = $request->input('expire_month');
        $expire_year = $request->input('expire_year');
        $cvc = $request->input('cvc');
        $city = $request->input('city');
        $zipCode = $request->input('zip_code');
        $address = $request->input('address');

        //Kullanıcıyı al
        $user = Auth::user();

        //Sepetteki ürünlerin toplam tutarını hesapla
        $total = $this->calculateCartTotal();

        //Sepeti Getir
        $cart = $this->getOrCreate();

        //Options Nesnesi Oluşturuldu
        $options = new Options();
        $options->setApiKey(env('TEST_IYZI_API_KEY'));
        $options->setSecretKey(env('TEST_IYZI_SECRET_KEY'));
        $options->setBaseUrl(env('TEST_IYZI_BASE_URL'));

        //Ödeme İsteği Oluştur
        $request = new CreatePaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId($cart->code);
        $request->setPrice($total);
        $request->setPaidPrice($total);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId($cart->code);
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);

        //PaymentCard Nesnesini Oluştur
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($first_name);
        $paymentCard->setCardNumber($card_no);
        $paymentCard->setExpireMonth($expire_month);
        $paymentCard->setExpireYear($expire_year);
        $paymentCard->setCvc($cvc);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        //Buye Nesnesini Oluşturma
        $buyer = new Buyer();
        $buyer->setId($user->id);
        $buyer->setName($user->first_name);
        $buyer->setSurname($user->last_name);
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail($user->email);
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2023-05-31 12:43:35");
        $buyer->setRegistrationDate("2023-05-31 15:12:09");
        $buyer->setRegistrationAddress($address);
        $buyer->setIp(\request()->ip());
        $buyer->setCity($city);
        $buyer->setCountry("Turkey");
        $buyer->setZipCode($zipCode);
        $request->setBuyer($buyer);

        //Kargo Adresi
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($first_name);
        $shippingAddress->setCity($city);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($address);
        $shippingAddress->setZipCode($zipCode);
        $request->setShippingAddress($shippingAddress);

        //Fatura Adresi
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($first_name);
        $billingAddress->setCity($city);
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress($address);
        $billingAddress->setZipCode($zipCode);
        $request->setBillingAddress($billingAddress);

        //Sepetteki Ürünleri (CartDetails) BasketItems listesi olarak hazırla
        $basketItems = $this->getBasketItems();
        $request->setBasketItems($basketItems);

        //Ödeme Yap
        $payment = \Iyzipay\Model\Payment::create($request, $options);

        //İşlem Başarılı Sipariş ve Fatura Oluştur
        if ($payment->getStatus() == 'success') {
            $cart->is_active = false;
            $cart->save();

            return redirect()->route('user.index')->with('message', 'Ödeme işlemi başarılı');
        } else {
            return  redirect()->route('show.checkout.form')->with('error', 'Ödeme işlemi başarısız');
        }
    }

    private function calculateCartTotal(): float
    {
        $total = 0;
        $cart = $this->getOrCreate();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail) {
            $total += $detail->product->price * $detail->quantity;
        }
        return $total;
    }

    private function getOrCreate(): Cart
    {
        $id = Auth::id();
        $cart = Cart::firstOrCreate(
            ['user_id' => $id, 'is_active' => true],
            ['code' => Str::random(8)]
        );
        return $cart;
    }

    private function getBasketItems(): array
    {
        $basketItems = array();
        $cart = $this->getOrCreate();
        $cartDetails = $cart->details;
        foreach ($cartDetails as $detail) {
            $item = new \Iyzipay\Model\BasketItem();
            $item->setId($detail->product->id);
            $item->setName($detail->product->title);
            $item->setCategory1($detail->product->category->title);
            $item->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $item->setPrice($detail->product->price);

            for ($i = 0; $i < $detail->quantity; $i++) {
                array_push($basketItems, $item);
            }
        }

        return $basketItems;
    }
}

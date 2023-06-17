<div class="col-md-3 pt-3">
    <form action="{{route('filter')}}" method="post" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6">
                <input class="form-control"  name="min_price" id="min_price" placeholder="min ₺">
            </div>
            <div class="col-lg-6">
                <input class="form-control" name="max_price" id="max_price" placeholder="max ₺">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-3">
                    <button class="btn btn-sm btn-primary col-md-12" type="submit">Filtrele</button>
                </div>
            </div>
        </div>
    </form>
</div>

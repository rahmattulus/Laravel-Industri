<x-layout.header />

<div class="container mt-4">
    <h2 class="text-primary text-center">Create Data Film</h2>
    <form action="{{url('post-datafilm')}}" method="post" enctype="multipart/form-data" class="form-group">
        @csrf
        <label for="poster" class="label-control">Poster Film : </label>
        <input type="file" name="poster" id="poster" class="form-control">
        <label for="title" class="label-control">Judul Film : </label>
        <input type="text" name="title" id="title" class="form-control">
        <label for="director" class="label-control">Director : </label>
        <textarea name="director" id="director" class="form-control"></textarea>
        <button type="submit" class="mt-4 btn btn-primary"> -> Add </button>
    </form>
</div>

<x-layout.footer />
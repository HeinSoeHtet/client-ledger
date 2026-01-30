<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required value="{{old('name', optional($client ?? null)->name)}}">
      @error('name')
      <div style="color: red">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{old('email', optional($client ?? null)->email)}}">
    @error('email')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="tel" name="phone" class="form-control" value="{{old('phone', optional($client ?? null)->phone)}}">
    @error('phone')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{old('address', optional($client ?? null)->address)}}">
    @error('address')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

<div class="form-group">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control-file" >
    @error('photo')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

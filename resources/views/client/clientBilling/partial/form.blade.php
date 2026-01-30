<div class="form-group">
    <label>Amount</label>
    <input type="text" name="amount" class="form-control" required value="{{old('amount', optional($billing ?? null)->amount)}}">
    @error('amount')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

<div class="form-group">
    <label>Due Date</label>
    <input type="date" name="due_date" class="form-control" value="{{old('due_date', optional($billing ?? null)->due_date)}}">
    @error('due_date')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

<div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" value="{{old('description', optional($billing ?? null)->description)}}">
    @error('description')
    <div style="color: red">{{$message}}</div>
  @enderror
</div>

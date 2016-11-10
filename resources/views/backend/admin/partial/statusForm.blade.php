  <div class="form-group">
    <label class="col-sm-2 control-label">状态</label>
    <div class="col-sm-10">
      <div class="radio">
        <label>
          <input type="radio" name="status" id="status1" value="0" @if($$obj->status == '禁用') checked @endif>
          禁用
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="status" id="status2" value="1" @if($$obj->status == '启用') checked @endif>
           启用
        </label>
      </div>
    </div>
  </div>
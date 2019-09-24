<!-- /.card-header -->
              <!-- form start -->
              <form role="form"  method='post' action="{{route('store')}}" enctype="multipart/form-data" >
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group ">
                <label for="exampleFormControlTextarea1">Discribtion</label>
                <textarea class="form-control" name="discription" id="exampleFormControlTextarea1"  placeholder="Enter Description "rows="3"></textarea>
              </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Course Cover</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                      <div class="input-group-append">
                      <br><br>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
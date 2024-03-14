<div class="row mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Title</h1>
          <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col" colspan="3" class="text-center">Setting</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="{{route('dpTitleUpdate')}}"><button type="button" class="btn btn-info">Update</button></a></td>
                <td><a href="{{route('dpTitleAdd')}}"><button type="button" class="btn btn-success">Add</button></a></td>
                <td><a href="#"><button type="button" class="btn btn-danger">Delete</button></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
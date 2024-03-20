
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Member</h1>
          <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Tương tác</th>
                <th scope="col">Setting</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>99</td>
                <td style="align-items: center"><a href="{{ route('manageAmin', ['type'=>"updateMember"]) }}"><button type="button" class="btn btn-info">Update</button></a>
                  &ensp;&ensp;<a href="#"> <button type="button" class="btn btn-danger">Delete</button></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
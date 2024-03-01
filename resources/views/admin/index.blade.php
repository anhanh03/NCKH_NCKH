@extends('admin.layout.app')

@section('content')
<div class="row m-3">
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-success-subtle text-center shadow p-3 rounded">
                Số bài đăng
            </div>
            
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-info-subtle text-center shadow p-3 rounded">
                Số thành viên
            </div>
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-warning-subtle text-center shadow p-3 rounded">
                Tổng tài liệu
            </div>
        </div>

    </div>
    <div class="col-sm-3 col-6 ">
        <div class="row" style="height: 140px;">
            <div class="col-12 w-75 my-2 bg-danger-subtle text-center shadow p-3 rounded">
                Số tương tác %
            </div>
        </div>

    </div>
</div>
<div class="row mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Content</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
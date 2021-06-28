.<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="row mt-5" style="margin:0 !important">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-req1" role="tab" aria-controls="">Danh sách khách hàng</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-req2" role="tab" aria-controls="">Sản phẩm được tạo trong tháng</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-req3" role="tab" aria-controls="">Số lượng khách hàng được tạo mới của từng tháng</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-req4" role="tab" aria-controls="">10 KH có tổng tiền mua hàng lớn nhất</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-req5" role="tab" aria-controls="">10 sản phẩm được mua nhiều nhất</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-req6" role="tab" aria-controls="">KH cùng với số lần mua</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-req7" role="tab" aria-controls="">Tổng tiền thu được trong từng tháng của năm</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-req8" role="tab" aria-controls="">Sản phẩm được bán từ tháng 3 năm nay mà được tạo từ năm ngoái</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-req9" role="tab" aria-controls="">Khách hàng đã không mua hàng được 6 tháng</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-req1" role="tabpanel" aria-labelledby="list-home-list">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach($request_One as $req)
                    <tr>
                        <td>{{$req['id']}}</td>
                        <td>{{$req['name']}}</td>
                        <td>{{$req['address']}}</td>
                        <td>{{$req['email']}}</td>
                        <td>{{$req['created_at']}}</td>
                        <td>{{$req['updated_at']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="lamvieccsdl?page=0">Previous</a></li>
            <li class="page-item"><a class="page-link" href="lamvieccsdl?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="lamvieccsdl?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="lamvieccsdl?page=3">3</a></li>
            <li class="page-item"><a class="page-link" href="lamvieccsdl?page=4">Next</a></li>
        </ul>
      </nav> -->
      </div>
      
      <div class="tab-pane fade" id="list-req2" role="tabpanel" aria-labelledby="list-profile-list">
        <table class="table">
              <thead>
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Price</th>
                  <th scope="col">Created_at</th>
                  <th scope="col">Updated_at</th>
                  </tr>
                  
              </thead>
              <tbody>
                  @foreach($request_Two as $req)
                      <tr>
                          <td>{{$req['id']}}</td>
                          <td>{{$req['name']}}</td>
                          <td>{{$req['qty']}}</td>
                          <td>{{$req['price']}}</td>
                          <td>{{$req['created_at']}}</td>
                          <td>{{$req['updated_at']}}</td>
                      </tr>
                  @endforeach
              </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req3" role="tabpanel" aria-labelledby="list-messages-list">
        <table class="table">
              <thead>
                  <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Month</th>
                  <th scope="col">Number Account</th>
                  </tr>
                  
              </thead>
              <tbody>
                  @foreach($request_Three as $index=>$req)
                      <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$req['Month']}}</td>
                          <td>{{$req['Qty']}}</td>
                      </tr>
                  @endforeach
              </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req4" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Four as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req['name']}}</td>
                            <td>{{$req['total']}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req5" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name Best Seller</th>
                    <th scope="col">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Five as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req->name}}</td>
                            <td>{{$req->BestSeller}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req6" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Six as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req->name}}</td>
                            <td>{{$req->NumberInvoice}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req7" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Month</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Seven as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req->Month}}</td>
                            <td>{{$req->Total}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req8" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Eight as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req->name}}</td>
                            <td>{{$req->Total}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="list-req9" role="tabpanel" aria-labelledby="list-settings-list">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request_Nice as $index=>$req)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$req->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
      
    </div>
    
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

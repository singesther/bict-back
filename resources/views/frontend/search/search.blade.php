<!DOCTYPE html>
<html>
    <head>
        <title>Live Search</title> 
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Contact Info</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="search">
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('#search').on('keyup', function(){
                $value=$(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('searchcontact')}}',
                    data: {'search': $value},
                    success:function(data){
                          $('tbody').html(data);
                    }
                });
            })
        </script>
    </body>
</html>

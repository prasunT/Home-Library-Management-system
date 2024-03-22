<!DOCTYPE html>

<html lang='en'>
  <head>
    <!--- Required meta tags--->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---bootstrat css--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Search </title>
    <style>

.main{
  background-image: url('aaaa.jpg');
  background-size:cover;
  

}
.card-header{
  font-size:20px;
  text-shadow:1px 1px 1px grey;
  padding-left:25px;
  justify-content:space-between;
  display:flex;
}

.card-header a{
  justify-content:space-around;
  text-decoration:none;
  padding-right:35px;

}
.input-group{
padding-left:25px;
}
    </style>
</head>
<body class="main" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-header">
            <h5> Search books by Book Name or Author Name </h5>
            <a href="http://localhost/Library/welcome/welcome.html" >Home</a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-7">
                <form action="" method="GET">
                <div class="input-group mb-3">
                  <input type="text" name="search" required value="<?php if(isset($_GET['search'])) {echo $_GET['search'];}?>" class="form-control">
                  <button type="submit" class="btn btn-primary"> Search </button>
      </div>
                </form>
             </div>
            </div>
          </div>
        </div>
       </div>

         <div class="col-md-12">
          
          <div class="card" mt-4>

          <div class="card-body">

            <table class="table table bordered">
              <thead>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Genre</th>
                <th>ISBN</th>
                <th>Edition</th>
                <th>Publisher</th>
                <th>Date of Publication</th>
                <th>Lent</th>
                <th>Lent to</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                 $con = mysqli_connect("localhost", "root", "", "library");
                 
                 if(isset($_GET['search']))
                 {
                     $filtervalues = $_GET['search'];
                     $query = "SELECT * FROM books WHERE CONCAT(id,Name,Author)  LIKE '%$filtervalues%'  ";
                     $query_run = mysqli_query($con, $query);


                     if(mysqli_num_rows($query_run)>0)
                     {
                        foreach($query_run as $items )
                        {
                            ?>
                        <tr>
                          <td ><?=$items['id']; ?> </td>
                          <td ><?=$items['Name']; ?> </td>
                          <td ><?=$items['Author']; ?> </td>
                          <td ><?=$items['Genre']; ?> </td>
                          <td ><?=$items['ISBN']; ?> </td>
                          <td ><?=$items['Edition']; ?> </td>
                          <td ><?=$items['Publisher']; ?> </td>
                          <td ><?=$items['Date_of_publication']; ?> </td>
                          <td ><?=$items['Lent']; ?> </td>
                          <td ><?=$items['Lent_to']; ?> </td>

                        </tr> 
                            <?php
                        }

                     }

                     else
                     {
                        ?>
                         <tr>
                          <td colspan="10"> No Records Found </td>

                         </tr> 
                        <?php
                      
                     }
                 }
              ?>

               <tr>
                

               </tr> 

              </tbody>
            </table>

          </div>

          </div>
         
         </div>

      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  
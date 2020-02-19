<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/public_controller.php";

  $table=$public_controller->get_all_visits();

?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
       
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                  
                <div class="card-header py-3 d-flex flex-row  ">
               
                </div>
                
                <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead >
                      <tr>
                        <th>No.</th>
                        <th>Year</th>
                        <th>Month</th>
            
                        <th># Visitors</th>
                      </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Year</th>
                        <th>Month</th>
            
                        <th># Visitors</th>
                      </tr>
                    </tfoot>
                    <tbody >
                   

                    <?php 
                       foreach($table as $k=>$row){?>
                      <tr>
                    <?php
                        echo"<td> $k</td>";
                        echo"<td>$row[year]</td>";
                      
                        echo"<td>$row[month]</td>";
                        echo"<td>$row[visitors]</td>";
                      ?>
                      </tr>
                       <?php }?>
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> 
        </div>






<?php  require "footer.php"; ?>

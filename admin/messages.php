<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/message_controller.php";
include "time.php";
  $table=$message_controller->get_message_FE();

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
                        <th>Nsme</th>
                        <th>Email</th>
                        <th>Content</th>
                        <th>Date</th>
            
                      </tr>
                    </thead>
                    <tfoot>
                    <tr>
                         <th>No.</th>
                        <th>NAme</th>
                        <th>Email</th>
                        <th>Content</th>
                        <th>Date</th>
            
                      </tr>
                    </tfoot>
                    <tbody >
                    <?php 
                       foreach($table as $k=>$row){?>
                      <tr>
                    <?php
                        echo"<td> $k</td>";
                        echo"<td>$row[sender_name]</td>";
                      
                        echo"<td>$row[sender_email]</td>";
                        echo"<td>$row[msg_content]</td>";
                        echo"<td>";
                        echo time_Ago($row['send_date'])."</td>";
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

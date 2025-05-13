   <!-- Blog Chart -->
   <div class="col-lg-6 col-md-12 mb-4">
       <div class="card">
           <div class="card-header d-flex justify-content-between align-items-center">
               <h4>Blog Analytics</h4>
               <select class="form-control form-control-sm w-auto" id="blogChartType">
                   <option value="bar">Bar Chart</option>
                   <option value="pie">Pie Chart</option>
                   <option value="doughnut" selected>Doughnut</option>
               </select>
           </div>
           <div class="card-body">
               <canvas id="blogChart" height="250"></canvas>
           </div>
       </div>
   </div>

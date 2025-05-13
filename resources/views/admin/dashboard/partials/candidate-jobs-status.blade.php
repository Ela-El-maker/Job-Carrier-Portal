 <div class="col-lg-6 col-md-12 mb-4">
     <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
             <h4>Candidate Analytics</h4>
             <select class="form-control form-control-sm w-auto" id="candidateChartType">
                 <option value="bar">Bar Chart</option>
                 <option value="pie">Pie Chart</option>
                 <option value="doughnut" selected>Doughnut</option>
             </select>
         </div>
         <div class="card-body">
             <canvas id="candidateChart" height="250"></canvas>
         </div>
     </div>
 </div>

 <div class="col-lg-6 col-md-12 mb-4">
     <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
             <h4>Job Status Distribution</h4>
             <select class="form-control form-control-sm w-auto" id="jobStatusChartType">
                 <option value="bar">Bar Chart</option>
                 <option value="pie">Pie Chart</option>
                 <option value="doughnut" selected>Doughnut</option>
             </select>
         </div>
         <div class="card-body">
             <canvas id="jobStatusChart" height="250"></canvas>
         </div>
     </div>
 </div>

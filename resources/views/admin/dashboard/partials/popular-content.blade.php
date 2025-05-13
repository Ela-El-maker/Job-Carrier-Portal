  <div class="col-lg-6 col-md-12 mb-4">
      <div class="card">
          <div class="card-header">
              <h4>Most Popular Blogs</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <tr>
                          <th>Title</th>
                          <th>Views</th>
                          <th>Author</th>
                      </tr>
                      @foreach ($popularBlogs as $blog)
                          <tr>
                              <td>{{ $blog->title }}</td>
                              <td>{{ $blog->views_count }}</td>
                              <td>{{ $blog->author->name ?? 'N/A' }}</td>
                          </tr>
                      @endforeach
                  </table>
              </div>
          </div>
      </div>
  </div>


  <div class="col-lg-6 col-md-12 mb-4">
      <div class="card">
          <div class="card-header">
              <h4>Most Popular Jobs</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <tr>
                          <th>Position</th>
                          <th>Views</th>
                          <th>Company</th>
                      </tr>
                      @foreach ($popularJobs as $job)
                          <tr>
                              <td>{{ $job->title }}</td>
                              <td>{{ $job->views_count }}</td>
                              <td>{{ $job->company->name ?? 'N/A' }}</td>
                          </tr>
                      @endforeach
                  </table>
              </div>
          </div>
      </div>
  </div>

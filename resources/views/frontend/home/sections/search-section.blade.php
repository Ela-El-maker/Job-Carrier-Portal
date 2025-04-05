 <!-- ===== Start of Job Search Section ===== -->
 <section class="job-search ptb40">
     <div class="container">

         <!-- Start of Form -->
         <form class="job-search-form row" action="{{ route('jobs.index') }}" method="GET">
             @csrf

             <!-- Start of keywords input -->
             <div class="col-md-3 col-sm-12 search-keywords">
                 <label for="search-keywords">Keywords</label>
                 <input name="search" type="text" id="search-keywords" placeholder="Keywords">
             </div>

             <!-- Start of category input -->
             <div class="col-md-3 col-sm-12 search-categories">
                 <label for="search-categories">Category</label>
                 <select name="category" class="selectpicker" id="search-categories" data-live-search="true"
                     title="Any Category" data-size="5" data-container="body">
                     @foreach ($jobCategories as $category)
                         <option @selected(request()?->category == $category?->id) value="{{ $category?->slug }}">
                             {{ $category?->name }}
                         </option>
                     @endforeach
                 </select>
             </div>

             <!-- Start of location input -->
             <div class="col-md-4 col-sm-12 search-location">
                 <label for="search-location">Location</label>
                 <div class="select-wrapper">
                     <select name="country" class="selectpicker country" id="search-categories" data-live-search="true"
                         title="Country" data-size="5" data-container="body">
                         <option value="">Country</option>
                         @foreach ($countries as $country)
                             <option @selected(request()?->country == $country?->id) value="{{ $country?->id }}">
                                 {{ $country?->name }}</option>
                         @endforeach
                     </select>
                     <i class="fas fa-globe select-icon"></i>
                 </div>
             </div>

             <!-- Start of submit input -->
             <div class="col-md-2 col-sm-12 search-submit">
                 <button type="submit" class="btn btn-blue btn-effect btn-large"><i
                         class="fa fa-search"></i>search</button>
             </div>

         </form>
         <!-- End of Form -->
         <hr class="mt40 mb40" style="border-color: #b1afaf;">

     </div>
 </section>
 <!-- ===== End of Job Search Section ===== -->

<header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-3 col-sm-6">
                  <a href="{{route('home')}}"><img src="{{url('public/uploads/Config')}}/{{$logo_home->value}}" style="width: 100px; height: 50px;" /></a>
                  
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs-12">
                        <form id="search-form-pc" role="search" action="{{route('search')}}" method="GET">
                           <div class="form-group">
                              <div class="input-group col-xs-12">
                                 <input id="search" type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                              </div>
                           </div>
                        </form>
                        <ul class="ui-autocomplete ajax-results">
                            
                            
                        </ul>   
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
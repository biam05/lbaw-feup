@extends('layouts.app')
@section('content')
<main style="margin-bottom: 60px;">
  @include('partials.navbar')
  @include('partials.trending')

  <?php
  if(!Auth::guest()){?>
      @include('partials.modals.new_post')
      <!-- TODO if user é o owner do post-->
      @include('partials.modals.delete_post')
      
      <?php
      }
    else{?>
      @include('partials.login_to_post')
    <?php 
    }?>

    @include('partials.modals.report_post')
  @include('partials.modals.delete_post')

  <div class="container-xl">
    <div class="row hidden-md-down">
        <div class="col-12 col-lg-9">
            @include('partials.post')
        </div>
        <div class="col-lg-3">
          <section class="container bg-light-dark text-white p-3 text-center">
            <h3 class="mb-4">Explore</h3>
            <hr class="text-muted">
            @include('partials.explore')
          </section>
        </div>
    </div>

    <nav class="hidden-lg-up">
      <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
          <li class="nav-item " role="presentation">
              <button class="nav-link active text-white" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link text-white" id="pills-explore-tab" data-bs-toggle="pill" data-bs-target="#pills-explore" type="button" role="tab" aria-controls="pills-explore" aria-selected="false">Explore</button>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              @include('partials.post')
          </div>
          <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">
              <section class="container-xl bg-light-dark text-white p-3 text-center">
                @include('partials.explore')
           </section>
          </div>
      </div>
  </nav>
</div>
</main>

@endsection

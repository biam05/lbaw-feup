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
            @include('partials.explore');
        </div>
    </div>
</div>
</main>

@endsection
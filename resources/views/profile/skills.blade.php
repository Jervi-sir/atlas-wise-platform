<div class="tab-pane fade" id="account-vertical-skills" role="tabpanel" aria-labelledby="account-pill-skills" aria-expanded="false">
    <!-- form class="validate-form" -->
    <form method="POST" action="{{ route('profile.skills') }}">
        @csrf
        <input name="skills" type="hidden" value="" id="skill-json">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <i data-feather="award" class="font-medium-3"></i>
                    <h4 class="mb-0 ml-75">Skills</h4>
                </div>
            </div>
            <?php
                $color = array("primary", "secondary", "success", "warning", "danger", "info");
            ?>
            <section id="clone-lists" class="col-12 ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <h4 class="mb-1 mt-0">My Skills</h4>
                                        <div id="badge-list-1" class="demo-inline-spacing">
                                                <div class="">&nbsp;</div>
                                                @foreach (Auth()->user()->skills()->get() as $skill)
                                                    <div class="badge badge-pill badge-<?php echo $color[rand(0,5)] ?> draggable">{{ $skill->name }}</div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="mb-1 mt-0">Available Skills</h4>
                                        <div id="badge-list-2" class="demo-inline-spacing">
                                            <div class="">&nbsp;</div>
                                            @foreach (\App\Models\Skill::all() as $skill)
                                                @if(! Auth()->user()->skills()->where('name', $skill->name)->exists() )
                                                <div class="badge badge-pill badge-<?php echo $color[rand(0,5)] ?> draggable">{{ $skill->name }}</div>
                                                @endif
                                            @endforeach
                                           
                                        </div>
                                        <div class="col-md-12 col-12 input-group pl-0 mt-2">
                                            <input type="text" class="form-control" placeholder="Add New Skill" aria-describedby="button-addon2" id="skill-input"/>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" id="add-skill-btn" type="button">Add</button>
                                            </div>
                                        </div>
                                        <!--
                                         <div class="search">
                                                <div class="search__wrapper">
                                                    <input type="text" name="" placeholder="Search for..." class="search__field">
                                                    <button type="submit" class="fa fa-search search__icon"></button>
                                                </div>
                                            </div>
                                        -->
                                    </div>
                                    <div class="col-md-6 col-12 mt-1">
                                        
                                        <p class="message-skill text-success" id="success-skill">Skill added successfully</p>
                                        <p class="message-skill text-danger" id="error-skill">Skill already exist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="col-12" style="padding-left: 2.5rem;">
                <button type="submit" class="btn btn-primary mt-1 mr-1" id="skills-submit">Save changes</button>
            </div>
        </div>
    </form>

    <!--/ form -->
</div>


<style>
  .message-skill {
      display: none;
      margin-top: 1em;
      margin-left: 1em;
  }

  .search {
  }
  .search * {
    outline: none;
    box-sizing: border-box;
  }
  .search__wrapper {
    position: relative;
  }
  .search__field {
    width: 10px;
    height: 10px;
    color: transparent;
    font-family: Lato, sans-serif;
    font-size: 100%;
    padding: 0.35em 50px 0.35em 0;
    border: 1px solid transparent;
    border-radius: 0;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
  .search__field:focus {
    border-bottom-color: #ccc;
    width: 2vw;
    color: #2b2b2b;
    cursor: default;
  }
  .search__field:focus ~ .search__icon {
    background-color: transparent;
    cursor: pointer;
    pointer-events: auto;
  }
  .search__icon {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #e9f1f4;
    width: 50px;
    height: 50px;
    font-size: 1.35em;
    text-align: center;
    border-color: transparent;
    border-radius: 50%;
    pointer-events: none;
    display: inline-block;
    transition: background-color 0.2s ease-in-out;
  }
  .search__field::-webkit-input-placeholder {
    position: relative;
    top: 0;
    left: 0;
    -webkit-transition-property: top, color;
    transition-property: top, color;
    transition-duration: 0.1s;
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    perspective: 1000;
  }
  .search__field:-moz-placeholder {
    position: relative;
    top: 0;
    left: 0;
    -moz-transition-property: top, color;
    transition-property: top, color;
    transition-duration: 0.1s;
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    perspective: 1000;
  }
  .search__field::-moz-placeholder {
    position: relative;
    top: 0;
    left: 0;
    -moz-transition-property: top, color;
    transition-property: top, color;
    transition-duration: 0.1s;
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    perspective: 1000;
  }
  .search__field:-ms-input-placeholder {
    position: relative;
    top: 0;
    left: 0;
    -ms-transition-property: top, color;
    transition-property: top, color;
    transition-duration: 0.1s;
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    perspective: 1000;
  }
  .search__field::-webkit-input-placeholder[style*=hidden] {
    color: #83b0c1;
    font-size: 0.65em;
    font-weight: normal;
    top: -20px;
    opacity: 1;
    visibility: visible !important;
  }
  .search__field:-moz-placeholder[style*=hidden] {
    color: #83b0c1;
    font-size: 0.65em;
    font-weight: normal;
    top: -20px;
    opacity: 1;
    visibility: visible !important;
  }
  .search__field::-moz-placeholder[style*=hidden] {
    color: #83b0c1;
    font-size: 0.65em;
    font-weight: normal;
    top: -20px;
    opacity: 1;
    visibility: visible !important;
  }
  .search__field:-ms-input-placeholder[style*=hidden] {
    color: #83b0c1;
    font-size: 0.65em;
    font-weight: normal;
    top: -20px;
    opacity: 1;
    visibility: visible !important;
  }



</style>
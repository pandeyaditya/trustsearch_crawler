<center>
<h1 class="banner-heading">My first search engine</h1>
    <form method="post" action="{{ url('/search') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div style="margin-right:20px;margin-top:40px;">
                    <input type="text" class="search_item" name="search_item" placeholder="Enter website like google without .com (extension) "><br/>
                    <p class="error">{!! $errors->first('search_item') !!}</p>
                    <input type="radio" name="searchmode" class="radio" value="trustpilot" checked="checked">TrustPilot
                    <input type="radio" name="searchmode" class="radio" value="trustedsearch">TrustedShops
                </div>
                <div class="button_style">
                    {{ csrf_field() }}
                    <input type="submit" value="Search" class="btn btn-lg btn-success">
                </div>
                </div>
            </div>
    </form>
</center>
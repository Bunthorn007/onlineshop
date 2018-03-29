@extends('./layouts/shop/app')

@section('header')
    <title>Shop Contact - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">
@endsection

@section('content')

    <div class="container">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Contact</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form action="{{url('/sendemail')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" />
                                    <input type="hidden" value="{{$shop->id}}" name="shop_id">
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-with-icon">
                                        <input id="form-control-24" name="email" class="form-control" type="email" placeholder="Email address" required>
                                        <span class="icon icon-envelope input-icon"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Subject</label>
                                    <select id="subject" name="subject" class="form-control" required="required">
                                        <option value="na" selected="">Choose One:</option>
                                        <option value="service">General Customer Service</option>
                                        <option value="suggestions">Suggestions</option>
                                        <option value="product">Product Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                    <address>
                        <strong>{{$shop->name}}</strong><br>
                        <?php echo$shop->address ?>
                        <abbr title="Phone">
                            <br/><br/>Phone:</abbr>
                        (+91) {{$shop->user->phone}}
                    </address>
                    <address>
                        <strong>Email</strong><br>
                        {{$shop->user->email}}
                    </address>
                    <address>
                        <strong>Owner Name</strong><br>
                        <a href="/profile/{{$shop->user->id}}">{{$shop->user->firstname.' '.$shop->user->lastname}}</a>
                    </address>
                </form>
            </div>
        </div>
    </div>


@endsection


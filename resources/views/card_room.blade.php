<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="{{$room->img}}" alt="{{$room->name}}">
        <div class="caption">
            <h3>{{$room->name}}</h3>
            <p>
            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                <a href="{{route('room', $room->path)}}"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="lFTktAclmqdU6ecZPUMPMxVBI7s9fsZei9mEvl4u"></form>
            </p>
        </div>
    </div>
</div>
@extends('adminlte::page')
@section('content')
<section id="pannel-blog">
    <div class="couter-articles">
        Total: <b><?php echo sizeOf($services); ?></b>
    </div><br>
    <main class="row">
        @foreach ($services as $service)
            <div class="col-md-3">
                <a href="{{route('services.edit',$service->id)}}"> 
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="card-comment d-flex">
                                <span class="username px-3">
                                    ID: {{$service->id}}
                                </span>
                            </div><br>
                            <span class="description">
                                <img style="width: 71px" src="{{asset('storage/'.$service->image)}}" alt="">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="px-3 titulo-card-imprensa">
                                    <b><p>{{$service->title}}</p></b>
                            </div>
                            <div class="px-3">
                                    {{$service->description}}
                            </div><br>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </main>
</section>
@endsection
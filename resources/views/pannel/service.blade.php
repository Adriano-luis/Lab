@extends('adminlte::page')
@section('content')
<main id="pannel-service">
    <aside class="couter-articles">
        Total: <b><?php echo sizeOf($services); ?></b>
    </aside><br>
    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-3">
                <a href="{{route('services.edit',$service->id)}}"> 
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="card-comment d-flex">
                                <span class="username px-3">
                                    ID: {{$service->id}}
                                </span>
                            </div>
                            <span class="image-service">
                                <img style="width: 71px" src="{{asset('storage/'.$service->image)}}" alt="{{$service->image_alt}}" title="{{$service->image_title}}" >
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="px-3 card-title-service">
                                    <b><p>{{$service->title}}</p></b>
                            </div>
                            <div class="px-3 description">
                                    {{$service->description}}
                            </div><br>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</main>
@endsection
@section('title')
Novo Agendamento
@endsection

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Novo Agendamento</h2>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ops!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('agendamentos.store' )}}" method="POST" autocomplete="off">
                            @csrf

                            <div class="row">
                                @include('agendamentos.fields')

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a class="btn btn-primary" href="{{ route('agendamentos.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
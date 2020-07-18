@extends('layouts.app')
@push('scripts')
    <script>
        $(document).ready(function () {
            getContact(1);
        });

        function getContact(group) {
            $.ajax({
                url: "{{ url('/get') }}/" + group + "/contact",
                context: document.body
            }).done(function (result) {
                groups = JSON.parse(result);
                var view = '';
                var  group_id=''
                i = 1;
                groups.forEach(function (contact) {
                    view += '<tr>\
                        <th scope="row">' + i++ + '</th>\
                        <td>' + contact.name + '</td>\
                        <td>' + contact.phone + '</td>\
                        <td>' + contact.address + '</td>\
                        </tr>';
                });
                group_id+='<input type="hidden" name="group" value="'+group+'">';
                $('#contact_group').html(group_id);
                $('#contacts').html(view);
            });

        }
    </script>
@endpush

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('assets/images/hero_1.jpg');"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Мои контакты</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Главная</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Мои контакты</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section block__18514" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mr-auto">
                    <div class="border p-4 rounded">
                        <ul class="list-unstyled block__47528 mb-0">
                            <li><span class="active">Группы</span></li>
                            @foreach($groups as $group)
                                <li><a href="#" onclick="getContact('{{$group->id}}')">{{$group->name}}</a></li>
                            @endforeach
                            <li>
                                 <a href="#" class="btn btn-success border-width-2 d-none d-lg-inline-block" data-toggle="modal" data-target="#addGroup">
                                     <span class="mr-2 icon-add"></span>Добавить Группу
                                 </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Адресс</th>
                        </tr>
                        </thead>
                        <tbody id="contacts"></tbody>
                    </table>
                    <a href="" class="btn btn-success border-width-2 d-none d-lg-inline-block" data-toggle="modal" data-target="#addContact">
                        <span class="mr-2 icon-add"></span>Добавить Контакт
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить группы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/add/group')}}" class="p-4 border rounded">
                    @csrf
                <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input type="text" id="group" name="group" value="{{old('group')}}" class="form-control" placeholder="Введите названия группы">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить Контакты</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('/add/contact')}}" class="p-4 border rounded">
                    @csrf
                    <div id="contact_group"></div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="name">ФИО</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="ФИО">
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="phone">Телефон</label>
                                <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Телефон">
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black has-feedback" for="address">Адрес</label>
                                <input type="text" id="phone" name="address" value="{{old('address')}}" class="form-control" placeholder="Адрес">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

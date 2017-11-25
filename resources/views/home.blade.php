<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Pepetasks">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="container u-mt-medium">
    <div class="row">
        <div class="col-lg-4">
            <form class="c-search-form c-search-form--dark" id="add-event" method="post" action="{{ url('event') }}">
                <h2 class="u-h3 u-mb-small">Create event</h2>

                <div class="c-search-form__section">
                    <div class="c-field has-icon-left">
                        <span class="c-field__icon"><i class="fa fa-tasks"></i></span>
                        <label class="c-field__label u-hidden-visually" for="event">Title</label>
                        <input class="c-input" id="event" name="event" type="text" placeholder="Title" value="{{ old('event') }}">
                    </div>
                </div>

                <div class="c-search-form__section">
                    <div class="c-field has-icon-left">
                        <span class="c-field__icon"><i class="fa fa-pencil"></i></span>
                        <label class="c-field__label u-hidden-visually" for="description">Event</label>
                        <input class="c-input" id="description" name="description" type="text" placeholder="Description" value="{{ old('description') }}">
                    </div>
                </div>

                <div class="c-search-form__section">
                    <div class="c-field has-icon-left">
                        <span class="c-field__icon"><i class="fa fa-calendar"></i></span>
                        <label class="c-field__label u-hidden-visually" for="date">Date</label>
                        <input class="c-input" data-toggle="datepicker" id="date" name="date" type="text" placeholder="Date" value="{{ old('date') }}">
                    </div>
                </div>

                {{ csrf_field() }}

                <button class="c-btn c-btn--fancy c-btn--fullwidth" type="submit">Create</button>
            </form>
        </div>
        <div class="col-md-8 col-xl-8">
            <main>
                <table class="c-table events">
                    <caption class="c-table__title">
                        Events <small>{{ count($events) }} total</small>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Event</th>
                            <th class="c-table__cell c-table__cell--head">Description</th>
                            <th class="c-table__cell c-table__cell--head">Date</th>
                            <th class="c-table__cell c-table__cell--head">Active</th>
                            <th class="c-table__cell c-table__cell--head u-text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($events as $event)
                        <tr class="c-table__row" data-id="{{ $event->id }}">
                            <td class="c-table__cell c-table__cel">
                            {{ $event->name }}
                            </td>

                            <td class="c-table__cell">
                                {{ $event->description }}
                            </td>
                            <td class="c-table__cell">
                                {{ $event->date->format('d/m/Y') }}
                            </td>

                            <td class="c-table__cell">
                                <div class="c-switch {{ ($event->active) ? "is-active" : "" }}">
                                    <input class="c-switch__input" id="active" type="checkbox">
                                </div>
                            </td>

                            <td class="c-table__cell">
                                <ul class="u-flex u-justify-around">
                                    <li class="u-text-large">
                                        <a class="u-text-mute" href="#" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-pencil"></i></a>
                                    </li>
                                    <li class="u-text-large">
                                        <a class="u-text-mute" href="#" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</div>

<div class="c-modal modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">

                <form class="c-search-form c-search-form--dark" id="edit-event" method="post" action="">

                    {!! method_field('patch') !!}

                    <div class="c-search-form__section">
                        <div class="row">
                            <div class="u-width-75">
                                <h3>Edit event</h3>
                            </div>
                            <div class="u-width-25">
                                <div class="c-switch {{ ($event->active) ? "is-active" : "" }} u-mt-xsmall u-ml-small">
                                    <label class="c-switch__label u-hidden-visually" for="active">Active</label>
                                    <input class="c-switch__input" id="active" name="active" type="checkbox" value="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-search-form__section">
                        <div class="c-field has-icon-left">
                            <span class="c-field__icon"><i class="fa fa-tasks"></i></span>
                            <label class="c-field__label u-hidden-visually" for="event">Title</label>
                            <input class="c-input" id="event" name="event" type="text" placeholder="Title">
                        </div>
                    </div>

                    <div class="c-search-form__section">
                        <div class="c-field has-icon-left">
                            <span class="c-field__icon"><i class="fa fa-pencil"></i></span>
                            <label class="c-field__label u-hidden-visually" for="description">Event</label>
                            <input class="c-input" id="description" name="description" type="text" placeholder="Description">
                        </div>
                    </div>

                    <div class="c-search-form__section">
                        <div class="c-field has-icon-left">
                            <span class="c-field__icon"><i class="fa fa-calendar"></i></span>
                            <label class="c-field__label u-hidden-visually" for="date">Date</label>
                            <input class="c-input" data-toggle="datepicker" id="date" name="date" type="text" placeholder="Date">
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <button class="c-btn c-btn--fancy c-btn--fullwidth" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="c-modal modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="c-card u-p-medium u-mh-auto" style="max-width:500px;">
                <form class="c-search-form c-search-form--dark" id="delete-event" method="post" action="">

                    {!! method_field('delete') !!}

                    <h3>Are you sure?</h3>
                    <p class="u-color-primary u-text-large u-text-center u-mt-medium">You will not be able to recover this event.</p>

                    {{ csrf_field() }}

                    <div class="modal-footer u-text-center u-mt-medium">
                        <button class="c-btn c-btn--danger c-btn--large u-mr-small" type="submit">Delete</button>
                        <button class="c-btn c-btn--primary c-btn--large u-ml-small" type="submit">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>
@extends('adminlte::page')

@section('title', 'Редактирование Schema')

@section('content_header')
    <h1>Schema Org Organization</h1>
@stop

@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form method="POST" action="{{ url('/admin/schema') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach($localizationList as $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $item->code }}-tab" data-toggle="tab" data-target="#{{ $item->code }}" type="button" role="tab" aria-controls="{{ $item->code }}" aria-selected="true">{{ $item->code }}</button>
                </li>
            @endforeach
        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
            @foreach($localizationList as $item)
                @php
                    $localizationId = $item->id;

                    if (count($schema) > 0) {
                        $currentDomaingData = json_decode($schema[$localizationId]);
                    }
                @endphp
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $item->code }}" role="tabpanel" aria-labelledby="{{ $item->code }}-tab">  
                    <div class="form-group">
                        <label for="{{ $localizationId }}_name" class="control-label">{{ 'Name (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[name]" type="text" id="{{ $localizationId }}_name" value="{{ isset($currentDomaingData->name) ? $currentDomaingData->name : old($localizationId . '.name') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_alternateName" class="control-label">{{ 'Alternate Name (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[alternateName]" type="text" id="{{ $localizationId }}_alternateName" value="{{ isset($currentDomaingData->alternateName) ? $currentDomaingData->alternateName : old($localizationId . '.alternateName') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_description" class="control-label">{{ 'Description (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[description]" type="text" id="{{ $localizationId }}_description" value="{{ isset($currentDomaingData->description) ? $currentDomaingData->description : old($localizationId . '.description') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_email" class="control-label">{{ 'Email (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[email]" type="text" id="{{ $localizationId }}_email" value="{{ isset($currentDomaingData->email) ? $currentDomaingData->email : old($localizationId . '.email') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_legalname" class="control-label">{{ 'Legal Name (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[legalName]" type="text" id="{{ $localizationId }}_legalname" value="{{ isset($currentDomaingData->legalName) ? $currentDomaingData->legalName : old($localizationId . '.legalName') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_type" class="control-label">{{ 'Address type (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][type]" type="text" id="{{ $localizationId }}_address_type" value="{{ isset($currentDomaingData->address->type) ? $currentDomaingData->address->type : old($localizationId . '.address.type') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_address_country" class="control-label">{{ 'Address Country (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][addressCountry]" type="text" id="{{ $localizationId }}_address_address_country" value="{{ isset($currentDomaingData->address->addressCountry) ? $currentDomaingData->address->addressCountry : old($localizationId . '.address.addressCountry') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_address_locality" class="control-label">{{ 'Address Locality (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][addressLocality]" type="text" id="{{ $localizationId }}_address_address_locality" value="{{ isset($currentDomaingData->address->addressLocality) ? $currentDomaingData->address->addressLocality : old($localizationId . '.address.addressLocality') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_address_region" class="control-label">{{ 'Address Region (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][addressRegion]" type="text" id="{{ $localizationId }}_address_address_region" value="{{ isset($currentDomaingData->address->addressRegion) ? $currentDomaingData->address->addressRegion : old($localizationId . '.address.addressRegion') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_postal_code" class="control-label">{{ 'Postal Code (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][postalCode]" type="text" id="{{ $localizationId }}_address_postal_code" value="{{ isset($currentDomaingData->address->postalCode) ? $currentDomaingData->address->postalCode : old($localizationId . '.address.postalCode') }}" >
                    </div>

                    <div class="form-group">
                        <label for="{{ $localizationId }}_address_street_address" class="control-label">{{ 'Street Address (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[address][streetAddress]" type="text" id="{{ $localizationId }}_address_street_address" value="{{ isset($currentDomaingData->address->streetAddress) ? $currentDomaingData->address->streetAddress : old($localizationId . '.address.streetAddress') }}" >
                    </div>

                    {{--<div class="form-group">
                        <label for="{{ $localizationId }}_same_as" class="control-label">{{ 'Same As (' . $item->code . ')' }}</label>
                        <input class="form-control" name="{{ $localizationId }}[sameAs]" type="text" id="{{ $localizationId }}_same_as" value="{{ isset($currentDomaingData->sameAs) ? $currentDomaingData->sameAs : old($localizationId . '.sameAs') }}" >
                    </div> --}}
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ 'Обновить' }}">
        </div>
    </form>

@stop

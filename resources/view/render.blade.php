<div class="{{ $getKey }} filter_render Zoroaster-Column-Filter">
    <label>{{ $label }}</label>
    <div class="body">
        {!! $render !!}
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.{{ $getKey }} select').focusout(function () { Func_{{ $getKey }}(); });

        $('.{{ $getKey }} input').change(function () { Func_{{ $getKey }}(); });

        function Func_{{ $getKey }}() {
            var columns = $('[name="{{ $columns }}"]').find(':selected').val();
            var operators = $('[name="{{ $operators }}"]').find(':selected').val();
            var data = $('[name="{{ $data }}"]').val();

            var param = [];
            param.push({name: '{{ $columns }}', value: columns });
            param.push({name: '{{ $operators }}', value: operators });
            param.push({name: '{{ $data }}', value: data });

            if ((columns != '' || operators != '') && data != '') {
                setParameters(param);

                index_resources('{{ $resource->uriKey() }}');

            }
        }
    });
</script>
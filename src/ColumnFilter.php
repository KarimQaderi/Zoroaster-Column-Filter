<?php

    namespace KarimQaderi\ZoroasterColumnFilter;

    use KarimQaderi\Zoroaster\Abstracts\ZoroasterResource;
    use KarimQaderi\Zoroaster\Fields\Group\Col;
    use KarimQaderi\Zoroaster\Fields\Group\Row;
    use KarimQaderi\Zoroaster\Fields\Group\RowOneColBg;
    use KarimQaderi\Zoroaster\Fields\Select;
    use KarimQaderi\Zoroaster\Fields\Text;
    use KarimQaderi\Zoroaster\ResourceFilters\AbstractFilters\Filter;
    use KarimQaderi\Zoroaster\Traits\ResourceRequest;

    class ColumnFilter extends Filter
    {

        public function apply($resource , $ZoroasterResource)
        {
            $args = collect($this->getValue())->values()->filter();

            $operators = $this->operators();
            $operators = isset($operators[$this->request('operators')]) ? value($operators[$this->request('operators')]) : '';

            return $args->count() !== 3 || $operators == '' ?
                $resource :
                $resource->where(
                    $this->request('columns') ,
                    $operators ,
                    $this->request('data')
                );
        }

        public function columns()
        {
            return [
                //
            ];
        }

        public function operators()
        {
            return [
                '' => '—' ,
                'equals' => '=' ,
                'gt' => '>' ,
                'ge' => '>=' ,
                'lt' => '<' ,
                'le' => '<=' ,
            ];
        }

        public function options()
        {
            return [];

        }

        /**
         * @param ZoroasterResource $resource
         * @return \Illuminate\View\View | string
         */
        public function render($resource)
        {
            $data = [
                $this->getKey('columns') => $this->request('columns') ,
                $this->getKey('operators') => $this->request('operators') ,
                $this->getKey('data') => $this->request('data')
            ];

            return view('ZoroasterColumnFilterView::render')
                ->with([
                    'getKey' => $this->getKey() ,
                    'label' => $this->label() ,
                    'columns' => $this->getKey('columns') ,
                    'operators' => $this->getKey('operators') ,
                    'data' => $this->getKey('data') ,
                    'resource' => $resource ,
                    'render' => static::RenderForm([
                        new RowOneColBg([
                            Text::make('' , $this->getKey('data')) ,
                            Select::make('' , $this->getKey('operators'))->options($this->operators()) ,
                            Select::make('' , $this->getKey('columns'))->options($this->columns()) ,
                        ] , 'uk-child-width-1-3')
                    ] , (object)$data)
                ]);
        }
    }

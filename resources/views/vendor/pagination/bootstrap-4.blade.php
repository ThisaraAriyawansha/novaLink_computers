@if ($paginator->hasPages())
    <!--  Pagination Area Start -->
    <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
        <div class="pages">
            <ul>


                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="li"><span class="page-link">{{ $element }}</span></li>
                    @elseif (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="li">
                                @if ($page == $paginator->currentPage())
                                    <a class="page-link active" href="#">{{ $page }}</a>
                                @else
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                @endforeach


            </ul>
        </div>
    </div>
    <!--  Pagination Area End -->
@endif

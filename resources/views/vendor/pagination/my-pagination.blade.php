
    {{----------MINHA PAGINAÇÃO---------}}
       <div class="pagination-content">
                <div class="box-pagination">
                  <div class="pagination-per-page">
                    <span>Itens por página:</span>
                    <select class="pagination-select form-select" id="mainSelectPagination">
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="500">500</option>
                    </select>
                  </div>
                  <div class="pagination-length">
                      <p class="m-0">
                        <span>{{$paginator->firstItem()}}-{{$paginator->lastItem()}}</span>
                        <span>of</span>
                        <span>{{ $paginator->total()}}</span>
                    </p>
                  </div>
                 <div class="pagination-buttons">
                   <nav class="box-button-pagination nav">
                     @if($paginator->onFirstPage())
                      <li class="item-button-paginate">
                        <a class="link-button-paginate">
                          <button class="butto-paginate paginator-disabled">
                            <i class="bx bxs-chevrons-left"></i>
                          </button>
                        </a>
                      </li>
                    @else
                    <li class="item-button-paginate">
                        <a class="link-button-paginate" href="{{ $paginator->previousPageUrl() }}">
                          <button class="butto-paginate">
                            <i class="bx bxs-chevrons-left"></i>
                          </button>
                        </a>
                      </li>
                     @endif
                      <li class="item-button-paginate">
                        <a class="link-button-paginate">
                           <button class="butto-paginate">
                             <i class="bx bxs-chevron-left"></i>
                           </button>
                        </a>
                      </li>
                        <li class="item-button-paginate">
                        <a class="link-button-paginate">
                           <button class="butto-paginate">
                             <i class="bx bxs-chevron-right"></i>
                           </button>
                        </a>
                      </li>
                       @if($paginator->hasMorePages())

                         <li class="item-button-paginate">
                            <a class="link-button-paginate" href="{{ $paginator->nextPageUrl()}}">
                               <button class="butto-paginate">
                                <i class="bx bxs-chevrons-right"></i>
                               </button>
                            </a>
                         </li>
                         @else
                           <li class="item-button-paginate">
                            <a class="link-button-paginate ">
                               <button class="butto-paginate paginator-disabled">
                                <i class="bx bxs-chevrons-right"></i>
                               </button>
                            </a>
                         </li>
                       @endif
                     
                    </nav>
                 </div>
                </div>
              </div>

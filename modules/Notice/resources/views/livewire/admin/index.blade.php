<div class="card-body">
    <x-page-search />

    <div class="table-responsive d-none">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Rooms') }}</th>
                    <th scope="col">{{ __('Occupants') }}</th>
                    <th scope="col">{{ __('Active') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($apartments ?? [] as $key => $apartment)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected" id="selected"
                                wire:model.defer="selected.{{ $key }}.{{ $apartment->id }}" />
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.show', ['apartment' => $apartment->id]) }}">
                                {{ $apartment->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.room.index', ['apartment' => $apartment->id]) }}">
                                <i class="fas fa-home text-muted me-1"></i>
                                {{ $apartment->rooms->count() }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.occupant.index', ['apartment' => $apartment->id]) }}">
                                <i class="fas fa-users text-muted me-1"></i>
                                {{ $apartment->occupants->count() }}
                            </a>
                        </td>
                        <td>
                            @if ($apartment->active)
                                <i class="fas fa-check text-success"></i>
                                Active
                            @else
                                <i class="fas fa-times text-danger"></i>
                                Disabled
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="action-btns">
                                <a href="{{ route('admin.apartment.show', $apartment->id) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.apartment.edit', $apartment->id) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('admin.apartment.destroy', $apartment->id) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm bg-transparent px-2 action-btn btn-delete bs-tooltip"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        {{-- <i class="fas fa-trash text-danger"></i> --}}
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (isset($apartments) and $apartments->count())
            {{ $apartments->links() }}
        @else
            <p class="text-center py-4">No record found.</p>
        @endif
    </div>

    <div class="row app-notes layout-top-spacing" id="cancel-row">
        <div class="col-lg-12">
            <div class="app-hamburger-container">
                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></div>
            </div>

            <div class="app-container">

                <div class="app-note-container">

                    <div class="app-note-overlay"></div>

                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mb-5">
                                <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link list-actions active" id="all-notes"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                            </svg> All Notes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions" id="note-fav"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg> Favourites</a>
                                    </li>
                                </ul>

                                <hr />

                                <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-tag">
                                        <path
                                            d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                        </path>
                                        <line x1="7" y1="7" x2="7" y2="7">
                                        </line>
                                    </svg> Tags</p>

                                <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link list-actions g-dot-primary" id="note-personal">Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions g-dot-warning" id="note-work">Work</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions g-dot-success" id="note-social">Social</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions g-dot-danger"
                                            id="note-important">Important</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                <a id="btn-add-notes" class="btn btn-secondary w-100" href="javascript:void(0);">Add
                                    Note</a>
                            </div>
                        </div>
                    </div>

                    <div id="ct" class="note-container note-grid">

                        <div class="note-item all-notes note-social">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Meeting with Kelly">
                                        Meeting with Kelly</p>
                                    <p class="meta-time">07 May</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Curabitur facilisis vel elit sed dapibus sodales purus rhoncus.">
                                            Curabitur facilisis vel elit sed dapibus sodales purus
                                            rhoncus.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes note-fav note-personal">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Receive Package">Receive
                                        Package</p>
                                    <p class="meta-time">01 May</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Curabitur facilisis vel elit sed dapibus sodales purus rhoncus.">
                                            Facilisis curabitur facilisis vel elit sed dapibus
                                            sodales purus rhoncus.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes note-work">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Imporant Infomation">
                                        Download Docs</p>
                                    <p class="meta-time">28 April</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Proin a dui malesuada, laoreet mi vel, imperdiet diam quam laoreet.">
                                            Proin a dui malesuada, laoreet mi vel, imperdiet diam
                                            quam laoreet.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Meeting Scheduled at 4:50pm">Meeting
                                        at
                                        4:50pm</p>
                                    <p class="meta-time">20 April</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Excepteur sint occaecat cupidatat non proident, anim id est laborum.">
                                            Excepteur sint occaecat cupidatat non proident, anim id
                                            est laborum.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Backup Files EOD">Backup
                                        Files EOD</p>
                                    <p class="meta-time">17 April</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Maecenas condimentum neque mollis, egestas leo ut, gravida.">
                                            Maecenas condimentum neque mollis, egestas leo ut,
                                            gravida.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes note-social">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Download Server Logs">
                                        Download Server Logs</p>
                                    <p class="meta-time">10 April</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Suspendisse efficitur diam quis gravida. Nunc molestie est eros.">
                                            Suspendisse efficitur diam quis gravida. Nunc molestie
                                            est eros.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Team meet at Starbucks">
                                        Team meet at Starbucks</p>
                                    <p class="meta-time">05 April</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Etiam a odio eget enim aliquet laoreet lobortis sed ornare nibh.">
                                            Etiam a odio eget enim aliquet laoreet lobortis sed
                                            ornare nibh.</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-item all-notes note-important">
                            <div class="note-inner-content">
                                <div class="note-content">
                                    <p class="note-title" data-noteTitle="Create new users Profile">
                                        Create new users Profile</p>
                                    <p class="meta-time">31 Mar</p>
                                    <div class="note-description-content">
                                        <p class="note-description"
                                            data-noteDescription="Duis aute irure dolor in voluptate nulla pariatur.">
                                            Duis aute irure in nulla pariatur. Etiam a odio eget
                                            enim aliquet</p>
                                    </div>
                                </div>
                                <div class="note-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-star fav-note">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 delete-note">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg>
                                </div>
                                <div class="note-footer">
                                    <div class="tags-selector btn-group">
                                        <a class="nav-link dropdown-toggle d-icon label-group"
                                            data-bs-toggle="dropdown" href="#" role="button"
                                            aria-haspopup="true" aria-expanded="true">
                                            <div class="tags">
                                                <div class="g-dot-personal"></div>
                                                <div class="g-dot-work"></div>
                                                <div class="g-dot-social"></div>
                                                <div class="g-dot-important"></div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="5" r="1">
                                                    </circle>
                                                    <circle cx="12" cy="19" r="1">
                                                    </circle>
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                            <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal"
                                                href="javascript:void(0);"> Personal</a>
                                            <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work"
                                                href="javascript:void(0);"> Work</a>
                                            <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social"
                                                href="javascript:void(0);"> Social</a>
                                            <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                href="javascript:void(0);"> Important</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog"
                aria-labelledby="notesMailModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title add-title" id="notesMailModalTitleeLabel">Add
                                Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18">
                                    </line>
                                    <line x1="6" y1="6" x2="18" y2="18">
                                    </line>
                                </svg>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">

                                    <form action="javascript:void(0);" id="notesMailModalTitle">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex note-title">
                                                    <input type="text" id="n-title" class="form-control"
                                                        maxlength="25" placeholder="Title">
                                                </div>
                                                <span class="validation-text"></span>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="d-flex note-description">
                                                    <textarea id="n-description" class="form-control" maxlength="60" placeholder="Description" rows="3"></textarea>
                                                </div>
                                                <span class="validation-text"></span>
                                                <span class="d-inline-block mt-1 text-danger">Maximum
                                                    Limit 60 characters</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-n-save" class="float-left btn">Save</button>
                            <button class="btn" data-bs-dismiss="modal">Discard</button>
                            <button id="btn-n-add" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('css')
        <link href="/assets/app/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css">
        <link href="/assets/app/src/assets/css/light/apps/notes.css" rel="stylesheet" type="text/css" />

        <link href="/assets/app/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css">
        <link href="/assets/app/src/assets/css/dark/apps/notes.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="/assets/app/src/assets/js/apps/notes.js"></script>
    @endpush
</div>

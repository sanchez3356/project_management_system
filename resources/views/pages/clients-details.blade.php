@extends('layouts.app')


@section('content')

<!-- clients details section start -->
<div class="row g-2">
    <div class="col-lg-12 col-md-12">
        <div class="card client-detail">
            <div class="card-body">
                <div class="d-flex">
                    <div class="profile-image">
                        <img width="200px" height="auto"
                            src="{{asset('storage/' . $client->avatar) ?: asset('storage/avatars/male.png') }}"
                            alt="{{ $client->username }}'s avatar image">
                    </div>
                    <div class="details ms-3">
                        <h4 class="h5 text-primary text-uppercase"><strong>@empty($user->profile->first_name) John @else
                                {{ $user->profile->first_name }}@endempty</strong>
                            @empty($user->profile->last_name) Doe @else {{ $user->profile->last_name }} @endempty <span
                                class="h6 text-secondary">@empty($user->profile->cjob_title) No job title available
                                @else
                                {{ $user->profile->job_title }} @endempty</span>
                        </h4>
                        <p>@empty($user->profile->address) No address provided @else {{ $user->profile->address }}
                            @endempty
                        </p>
                        <p>{{profile_progress($client)}}</p>
                        <p class="social-icon">
                            <a title="Twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                            <a title="Facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                            <a title="Google-plus" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                            <a title="Behance" href="javascript:void(0);"><i class="fa fa-behance"></i></a>
                            <a title="Instagram" href="javascript:void(0);"><i class="fa fa-instagram "></i></a>
                        </p>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-primary"> <a class="link-light"
                                    href="{{ route('clients.edit', $client->id) }}">Edit
                                    Profile</a>
                            </button>
                            <button class="btn btn-sm btn-success">Message</button>
                        </div>
                    </div>
                    <div class="profile-progress ms-auto">
                        <div id="profileCircle" data-progress="{{profile_progress($client)}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">DS - Design Team</h6>
                <small>Ranking 2th</small>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false"></a>
                        <ul class="dropdown-menu dropstart list-unstyled">
                            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Another Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="mb-3">Info about Design Team <span class="badge bg-success float-end">New</span></h6>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
                <ul class="list-unstyled team-info mt-3 d-flex align-items-center">
                    <li class="me-3"><small class="text-muted">Team</small></li>
                    <li><img src="../dist/assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar3.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar4.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar"></li>
                </ul>
                <div class="progress mb-3" style="height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 87%" aria-valuenow="87" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <small>PROJECTS: 12</small>
                        <h6>BUDGET: 4,870 USD</h6>
                    </div>
                    <div>
                        <div id="project_design" style="min-height: 40px;">
                            <div id="apexchartsvgaqs5ug"
                                class="apexcharts-canvas apexchartsvgaqs5ug apexcharts-theme-light"
                                style="width: 60px; height: 40px;"><svg id="SvgjsSvg2215" width="60" height="40"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <foreignObject x="0" y="0" width="60" height="40">
                                        <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                            style="max-height: 20px;"></div>
                                    </foreignObject>
                                    <g id="SvgjsG2268" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)">
                                    </g>
                                    <g id="SvgjsG2217" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(13, 0)">
                                        <defs id="SvgjsDefs2216">
                                            <linearGradient id="SvgjsLinearGradient2219" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop2220" stop-opacity="0.4"
                                                    stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                <stop id="SvgjsStop2221" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                <stop id="SvgjsStop2222" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            </linearGradient>
                                            <clipPath id="gridRectMaskvgaqs5ug">
                                                <rect id="SvgjsRect2224" width="66" height="42" x="-12" y="-1" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskvgaqs5ug"></clipPath>
                                            <clipPath id="nonForecastMaskvgaqs5ug"></clipPath>
                                            <clipPath id="gridRectMarkerMaskvgaqs5ug">
                                                <rect id="SvgjsRect2225" width="46" height="44" x="-2" y="-2" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect2223" width="4.2" height="40" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke-dasharray="3"
                                            fill="url(#SvgjsLinearGradient2219)" class="apexcharts-xcrosshairs" y2="40"
                                            filter="none" fill-opacity="0.9"></rect>
                                        <g id="SvgjsG2247" class="apexcharts-grid">
                                            <g id="SvgjsG2248" class="apexcharts-gridlines-horizontal"
                                                style="display: none;">
                                                <line id="SvgjsLine2251" x1="-9" y1="0" x2="51" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2252" x1="-9" y1="10" x2="51" y2="10"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2253" x1="-9" y1="20" x2="51" y2="20"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2254" x1="-9" y1="30" x2="51" y2="30"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2255" x1="-9" y1="40" x2="51" y2="40"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG2249" class="apexcharts-gridlines-vertical"
                                                style="display: none;"></g>
                                            <line id="SvgjsLine2257" x1="0" y1="40" x2="42" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                            <line id="SvgjsLine2256" x1="0" y1="1" x2="0" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG2226" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG2227" class="apexcharts-series" rel="1" seriesName="series-1"
                                                data:realIndex="0">
                                                <path id="SvgjsPath2232"
                                                    d="M -2.1 40.001 L -2.1 30.001 L 0.10000000000000009 30.001 L 0.10000000000000009 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M -2.1 40.001 L -2.1 30.001 L 0.10000000000000009 30.001 L 0.10000000000000009 40.001 Z"
                                                    pathFrom="M -2.1 40.001 L -2.1 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L -2.1 40.001 Z"
                                                    cy="30" cx="1.1" j="0" val="2" barHeight="10" barWidth="4.2"></path>
                                                <path id="SvgjsPath2234"
                                                    d="M 3.9 40.001 L 3.9 15.001 L 6.1 15.001 L 6.1 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 3.9 40.001 L 3.9 15.001 L 6.1 15.001 L 6.1 40.001 Z"
                                                    pathFrom="M 3.9 40.001 L 3.9 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 3.9 40.001 Z"
                                                    cy="15" cx="7.1" j="1" val="5" barHeight="25" barWidth="4.2"></path>
                                                <path id="SvgjsPath2236"
                                                    d="M 9.9 40.001 L 9.9 0.001 L 12.100000000000001 0.001 L 12.100000000000001 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 9.9 40.001 L 9.9 0.001 L 12.100000000000001 0.001 L 12.100000000000001 40.001 Z"
                                                    pathFrom="M 9.9 40.001 L 9.9 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 9.9 40.001 Z"
                                                    cy="0" cx="13.100000000000001" j="2" val="8" barHeight="40"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2238"
                                                    d="M 15.9 40.001 L 15.9 25.001 L 18.1 25.001 L 18.1 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 15.9 40.001 L 15.9 25.001 L 18.1 25.001 L 18.1 40.001 Z"
                                                    pathFrom="M 15.9 40.001 L 15.9 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 15.9 40.001 Z"
                                                    cy="25" cx="19.1" j="3" val="3" barHeight="15" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2240"
                                                    d="M 21.9 40.001 L 21.9 15.001 L 24.099999999999998 15.001 L 24.099999999999998 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 21.9 40.001 L 21.9 15.001 L 24.099999999999998 15.001 L 24.099999999999998 40.001 Z"
                                                    pathFrom="M 21.9 40.001 L 21.9 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 21.9 40.001 Z"
                                                    cy="15" cx="25.099999999999998" j="4" val="5" barHeight="25"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2242"
                                                    d="M 27.9 40.001 L 27.9 5.001 L 30.1 5.001 L 30.1 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 27.9 40.001 L 27.9 5.001 L 30.1 5.001 L 30.1 40.001 Z"
                                                    pathFrom="M 27.9 40.001 L 27.9 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 27.9 40.001 Z"
                                                    cy="5" cx="31.1" j="5" val="7" barHeight="35" barWidth="4.2"></path>
                                                <path id="SvgjsPath2244"
                                                    d="M 33.9 40.001 L 33.9 35.001 L 36.1 35.001 L 36.1 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 33.9 40.001 L 33.9 35.001 L 36.1 35.001 L 36.1 40.001 Z"
                                                    pathFrom="M 33.9 40.001 L 33.9 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 33.9 40.001 Z"
                                                    cy="35" cx="37.1" j="6" val="1" barHeight="5" barWidth="4.2"></path>
                                                <path id="SvgjsPath2246"
                                                    d="M 39.9 40.001 L 39.9 10.001 L 42.1 10.001 L 42.1 40.001 Z"
                                                    fill="rgba(116,96,238,0.85)" fill-opacity="1" stroke="#7460ee"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskvgaqs5ug)"
                                                    pathTo="M 39.9 40.001 L 39.9 10.001 L 42.1 10.001 L 42.1 40.001 Z"
                                                    pathFrom="M 39.9 40.001 L 39.9 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 39.9 40.001 Z"
                                                    cy="10" cx="43.1" j="7" val="6" barHeight="30" barWidth="4.2">
                                                </path>
                                                <g id="SvgjsG2229" class="apexcharts-bar-goals-markers"
                                                    style="pointer-events: none">
                                                    <g id="SvgjsG2231" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2233" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2235" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2237" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2239" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2241" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2243" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                    <g id="SvgjsG2245" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskvgaqs5ug)"></g>
                                                </g>
                                                <g id="SvgjsG2230"
                                                    class="apexcharts-bar-shadows apexcharts-hidden-element-shown"
                                                    style="pointer-events: none"></g>
                                            </g>
                                            <g id="SvgjsG2228"
                                                class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                data:realIndex="0"></g>
                                        </g>
                                        <g id="SvgjsG2250" class="apexcharts-grid-borders" style="display: none;"></g>
                                        <line id="SvgjsLine2258" x1="-9" y1="0" x2="51" y2="0" stroke="#b6b6b6"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine2259" x1="-9" y1="0" x2="51" y2="0" stroke-dasharray="0"
                                            stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG2260" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG2261" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG2269" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG2270" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG2271" class="apexcharts-point-annotations"></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(116, 96, 238);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">MT - Marketing Team</h6>
                <small>Ranking 4th</small>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-end dropstart list-unstyled">
                            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Another Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="mb-3">Info about Marketing Team</h6>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
                <ul class="list-unstyled team-info mt-3 d-flex align-items-center">
                    <li class="me-3"><small class="text-muted">Team</small></li>
                    <li><img src="../dist/assets/images/xs/avatar10.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar9.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar8.jpg" title="Avatar" alt="Avatar"></li>
                </ul>
                <div class="progress mb-3" style="height: 5px;">
                    <div class="progress-bar bg-success" style="width: 34%" aria-valuenow="34" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <small>PROJECTS: 08</small>
                        <h6>BUDGET: 2,170 USD</h6>
                    </div>
                    <div>
                        <div id="project_marketing" style="min-height: 40px;">
                            <div id="apexcharts54wnci4w"
                                class="apexcharts-canvas apexcharts54wnci4w apexcharts-theme-light"
                                style="width: 60px; height: 40px;"><svg id="SvgjsSvg2272" width="60" height="40"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <foreignObject x="0" y="0" width="60" height="40">
                                        <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                            style="max-height: 20px;"></div>
                                    </foreignObject>
                                    <g id="SvgjsG2325" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)">
                                    </g>
                                    <g id="SvgjsG2274" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(13, 0)">
                                        <defs id="SvgjsDefs2273">
                                            <linearGradient id="SvgjsLinearGradient2276" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop2277" stop-opacity="0.4"
                                                    stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                <stop id="SvgjsStop2278" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                <stop id="SvgjsStop2279" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            </linearGradient>
                                            <clipPath id="gridRectMask54wnci4w">
                                                <rect id="SvgjsRect2281" width="66" height="42" x="-12" y="-1" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMask54wnci4w"></clipPath>
                                            <clipPath id="nonForecastMask54wnci4w"></clipPath>
                                            <clipPath id="gridRectMarkerMask54wnci4w">
                                                <rect id="SvgjsRect2282" width="46" height="44" x="-2" y="-2" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect2280" width="4.2" height="40" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke-dasharray="3"
                                            fill="url(#SvgjsLinearGradient2276)" class="apexcharts-xcrosshairs" y2="40"
                                            filter="none" fill-opacity="0.9"></rect>
                                        <g id="SvgjsG2304" class="apexcharts-grid">
                                            <g id="SvgjsG2305" class="apexcharts-gridlines-horizontal"
                                                style="display: none;">
                                                <line id="SvgjsLine2308" x1="-9" y1="0" x2="51" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2309" x1="-9" y1="10" x2="51" y2="10"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2310" x1="-9" y1="20" x2="51" y2="20"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2311" x1="-9" y1="30" x2="51" y2="30"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2312" x1="-9" y1="40" x2="51" y2="40"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG2306" class="apexcharts-gridlines-vertical"
                                                style="display: none;"></g>
                                            <line id="SvgjsLine2314" x1="0" y1="40" x2="42" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                            <line id="SvgjsLine2313" x1="0" y1="1" x2="0" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG2283" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG2284" class="apexcharts-series" rel="1" seriesName="series-1"
                                                data:realIndex="0">
                                                <path id="SvgjsPath2289"
                                                    d="M -2.1 40.001 L -2.1 10.001 L 0.10000000000000009 10.001 L 0.10000000000000009 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M -2.1 40.001 L -2.1 10.001 L 0.10000000000000009 10.001 L 0.10000000000000009 40.001 Z"
                                                    pathFrom="M -2.1 40.001 L -2.1 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L -2.1 40.001 Z"
                                                    cy="10" cx="1.1" j="0" val="6" barHeight="30" barWidth="4.2"></path>
                                                <path id="SvgjsPath2291"
                                                    d="M 3.9 40.001 L 3.9 30.001 L 6.1 30.001 L 6.1 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 3.9 40.001 L 3.9 30.001 L 6.1 30.001 L 6.1 40.001 Z"
                                                    pathFrom="M 3.9 40.001 L 3.9 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 3.9 40.001 Z"
                                                    cy="30" cx="7.1" j="1" val="2" barHeight="10" barWidth="4.2"></path>
                                                <path id="SvgjsPath2293"
                                                    d="M 9.9 40.001 L 9.9 25.001 L 12.100000000000001 25.001 L 12.100000000000001 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 9.9 40.001 L 9.9 25.001 L 12.100000000000001 25.001 L 12.100000000000001 40.001 Z"
                                                    pathFrom="M 9.9 40.001 L 9.9 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 9.9 40.001 Z"
                                                    cy="25" cx="13.100000000000001" j="2" val="3" barHeight="15"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2295"
                                                    d="M 15.9 40.001 L 15.9 20.001 L 18.1 20.001 L 18.1 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 15.9 40.001 L 15.9 20.001 L 18.1 20.001 L 18.1 40.001 Z"
                                                    pathFrom="M 15.9 40.001 L 15.9 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 15.9 40.001 Z"
                                                    cy="20" cx="19.1" j="3" val="4" barHeight="20" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2297"
                                                    d="M 21.9 40.001 L 21.9 0.001 L 24.099999999999998 0.001 L 24.099999999999998 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 21.9 40.001 L 21.9 0.001 L 24.099999999999998 0.001 L 24.099999999999998 40.001 Z"
                                                    pathFrom="M 21.9 40.001 L 21.9 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 21.9 40.001 Z"
                                                    cy="0" cx="25.099999999999998" j="4" val="8" barHeight="40"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2299"
                                                    d="M 27.9 40.001 L 27.9 5.001 L 30.1 5.001 L 30.1 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 27.9 40.001 L 27.9 5.001 L 30.1 5.001 L 30.1 40.001 Z"
                                                    pathFrom="M 27.9 40.001 L 27.9 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 27.9 40.001 Z"
                                                    cy="5" cx="31.1" j="5" val="7" barHeight="35" barWidth="4.2"></path>
                                                <path id="SvgjsPath2301"
                                                    d="M 33.9 40.001 L 33.9 10.001 L 36.1 10.001 L 36.1 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 33.9 40.001 L 33.9 10.001 L 36.1 10.001 L 36.1 40.001 Z"
                                                    pathFrom="M 33.9 40.001 L 33.9 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 33.9 40.001 Z"
                                                    cy="10" cx="37.1" j="6" val="6" barHeight="30" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2303"
                                                    d="M 39.9 40.001 L 39.9 30.001 L 42.1 30.001 L 42.1 40.001 Z"
                                                    fill="rgba(249,99,50,0.85)" fill-opacity="1" stroke="#f96332"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMask54wnci4w)"
                                                    pathTo="M 39.9 40.001 L 39.9 30.001 L 42.1 30.001 L 42.1 40.001 Z"
                                                    pathFrom="M 39.9 40.001 L 39.9 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 39.9 40.001 Z"
                                                    cy="30" cx="43.1" j="7" val="2" barHeight="10" barWidth="4.2">
                                                </path>
                                                <g id="SvgjsG2286" class="apexcharts-bar-goals-markers"
                                                    style="pointer-events: none">
                                                    <g id="SvgjsG2288" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2290" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2292" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2294" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2296" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2298" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2300" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                    <g id="SvgjsG2302" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMask54wnci4w)"></g>
                                                </g>
                                                <g id="SvgjsG2287"
                                                    class="apexcharts-bar-shadows apexcharts-hidden-element-shown"
                                                    style="pointer-events: none"></g>
                                            </g>
                                            <g id="SvgjsG2285"
                                                class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                data:realIndex="0"></g>
                                        </g>
                                        <g id="SvgjsG2307" class="apexcharts-grid-borders" style="display: none;"></g>
                                        <line id="SvgjsLine2315" x1="-9" y1="0" x2="51" y2="0" stroke="#b6b6b6"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine2316" x1="-9" y1="0" x2="51" y2="0" stroke-dasharray="0"
                                            stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG2317" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG2318" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG2326" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG2327" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG2328" class="apexcharts-point-annotations"></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(249, 99, 50);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title">DT - Developers Team</h6>
                <small>Ranking 5th</small>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false"></a>
                        <ul class="dropdown-menu dropstart list-unstyled">
                            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Another Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="mb-3">Info about Developers Team</h6>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
                <ul class="list-unstyled team-info mt-3 d-flex align-items-center">
                    <li class="me-3"><small class="text-muted">Team</small></li>
                    <li><img src="../dist/assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar3.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar4.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar6.jpg" title="Avatar" alt="Avatar"></li>
                    <li><img src="../dist/assets/images/xs/avatar7.jpg" title="Avatar" alt="Avatar"></li>
                </ul>
                <div class="progress mb-3" style="height: 5px;">
                    <div class="progress-bar bg-warning" style="width: 54%" aria-valuenow="54" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <small>PROJECTS: 23</small>
                        <h6>BUDGET: 8,000 USD</h6>
                    </div>
                    <div>
                        <div id="project_dev" style="min-height: 40px;">
                            <div id="apexchartsqo8ls0cl"
                                class="apexcharts-canvas apexchartsqo8ls0cl apexcharts-theme-light"
                                style="width: 60px; height: 40px;"><svg id="SvgjsSvg2329" width="60" height="40"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <foreignObject x="0" y="0" width="60" height="40">
                                        <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                            style="max-height: 20px;"></div>
                                    </foreignObject>
                                    <g id="SvgjsG2382" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)">
                                    </g>
                                    <g id="SvgjsG2331" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(13, 0)">
                                        <defs id="SvgjsDefs2330">
                                            <linearGradient id="SvgjsLinearGradient2333" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop2334" stop-opacity="0.4"
                                                    stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                <stop id="SvgjsStop2335" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                <stop id="SvgjsStop2336" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            </linearGradient>
                                            <clipPath id="gridRectMaskqo8ls0cl">
                                                <rect id="SvgjsRect2338" width="66" height="42" x="-12" y="-1" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskqo8ls0cl"></clipPath>
                                            <clipPath id="nonForecastMaskqo8ls0cl"></clipPath>
                                            <clipPath id="gridRectMarkerMaskqo8ls0cl">
                                                <rect id="SvgjsRect2339" width="46" height="44" x="-2" y="-2" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect2337" width="4.2" height="40" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke-dasharray="3"
                                            fill="url(#SvgjsLinearGradient2333)" class="apexcharts-xcrosshairs" y2="40"
                                            filter="none" fill-opacity="0.9"></rect>
                                        <g id="SvgjsG2361" class="apexcharts-grid">
                                            <g id="SvgjsG2362" class="apexcharts-gridlines-horizontal"
                                                style="display: none;">
                                                <line id="SvgjsLine2365" x1="-9" y1="0" x2="51" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2366" x1="-9" y1="10" x2="51" y2="10"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2367" x1="-9" y1="20" x2="51" y2="20"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2368" x1="-9" y1="30" x2="51" y2="30"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2369" x1="-9" y1="40" x2="51" y2="40"
                                                    stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG2363" class="apexcharts-gridlines-vertical"
                                                style="display: none;"></g>
                                            <line id="SvgjsLine2371" x1="0" y1="40" x2="42" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                            <line id="SvgjsLine2370" x1="0" y1="1" x2="0" y2="40" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG2340" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG2341" class="apexcharts-series" rel="1" seriesName="series-1"
                                                data:realIndex="0">
                                                <path id="SvgjsPath2346"
                                                    d="M -2.1 40.001 L -2.1 0.001 L 0.10000000000000009 0.001 L 0.10000000000000009 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M -2.1 40.001 L -2.1 0.001 L 0.10000000000000009 0.001 L 0.10000000000000009 40.001 Z"
                                                    pathFrom="M -2.1 40.001 L -2.1 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L 0.10000000000000009 40.001 L -2.1 40.001 Z"
                                                    cy="0" cx="1.1" j="0" val="8" barHeight="40" barWidth="4.2"></path>
                                                <path id="SvgjsPath2348"
                                                    d="M 3.9 40.001 L 3.9 30.001 L 6.1 30.001 L 6.1 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 3.9 40.001 L 3.9 30.001 L 6.1 30.001 L 6.1 40.001 Z"
                                                    pathFrom="M 3.9 40.001 L 3.9 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 6.1 40.001 L 3.9 40.001 Z"
                                                    cy="30" cx="7.1" j="1" val="2" barHeight="10" barWidth="4.2"></path>
                                                <path id="SvgjsPath2350"
                                                    d="M 9.9 40.001 L 9.9 25.001 L 12.100000000000001 25.001 L 12.100000000000001 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 9.9 40.001 L 9.9 25.001 L 12.100000000000001 25.001 L 12.100000000000001 40.001 Z"
                                                    pathFrom="M 9.9 40.001 L 9.9 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 12.100000000000001 40.001 L 9.9 40.001 Z"
                                                    cy="25" cx="13.100000000000001" j="2" val="3" barHeight="15"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2352"
                                                    d="M 15.9 40.001 L 15.9 20.001 L 18.1 20.001 L 18.1 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 15.9 40.001 L 15.9 20.001 L 18.1 20.001 L 18.1 40.001 Z"
                                                    pathFrom="M 15.9 40.001 L 15.9 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 18.1 40.001 L 15.9 40.001 Z"
                                                    cy="20" cx="19.1" j="3" val="4" barHeight="20" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2354"
                                                    d="M 21.9 40.001 L 21.9 10.001 L 24.099999999999998 10.001 L 24.099999999999998 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 21.9 40.001 L 21.9 10.001 L 24.099999999999998 10.001 L 24.099999999999998 40.001 Z"
                                                    pathFrom="M 21.9 40.001 L 21.9 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 24.099999999999998 40.001 L 21.9 40.001 Z"
                                                    cy="10" cx="25.099999999999998" j="4" val="6" barHeight="30"
                                                    barWidth="4.2"></path>
                                                <path id="SvgjsPath2356"
                                                    d="M 27.9 40.001 L 27.9 15.001 L 30.1 15.001 L 30.1 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 27.9 40.001 L 27.9 15.001 L 30.1 15.001 L 30.1 40.001 Z"
                                                    pathFrom="M 27.9 40.001 L 27.9 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 30.1 40.001 L 27.9 40.001 Z"
                                                    cy="15" cx="31.1" j="5" val="5" barHeight="25" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2358"
                                                    d="M 33.9 40.001 L 33.9 30.001 L 36.1 30.001 L 36.1 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 33.9 40.001 L 33.9 30.001 L 36.1 30.001 L 36.1 40.001 Z"
                                                    pathFrom="M 33.9 40.001 L 33.9 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 36.1 40.001 L 33.9 40.001 Z"
                                                    cy="30" cx="37.1" j="6" val="2" barHeight="10" barWidth="4.2">
                                                </path>
                                                <path id="SvgjsPath2360"
                                                    d="M 39.9 40.001 L 39.9 5.001 L 42.1 5.001 L 42.1 40.001 Z"
                                                    fill="rgba(44,168,255,0.85)" fill-opacity="1" stroke="#2ca8ff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskqo8ls0cl)"
                                                    pathTo="M 39.9 40.001 L 39.9 5.001 L 42.1 5.001 L 42.1 40.001 Z"
                                                    pathFrom="M 39.9 40.001 L 39.9 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 42.1 40.001 L 39.9 40.001 Z"
                                                    cy="5" cx="43.1" j="7" val="7" barHeight="35" barWidth="4.2"></path>
                                                <g id="SvgjsG2343" class="apexcharts-bar-goals-markers"
                                                    style="pointer-events: none">
                                                    <g id="SvgjsG2345" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2347" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2349" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2351" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2353" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2355" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2357" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                    <g id="SvgjsG2359" className="apexcharts-bar-goals-groups"
                                                        class="apexcharts-hidden-element-shown"
                                                        clip-path="url(#gridRectMarkerMaskqo8ls0cl)"></g>
                                                </g>
                                                <g id="SvgjsG2344"
                                                    class="apexcharts-bar-shadows apexcharts-hidden-element-shown"
                                                    style="pointer-events: none"></g>
                                            </g>
                                            <g id="SvgjsG2342"
                                                class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                data:realIndex="0"></g>
                                        </g>
                                        <g id="SvgjsG2364" class="apexcharts-grid-borders" style="display: none;"></g>
                                        <line id="SvgjsLine2372" x1="-9" y1="0" x2="51" y2="0" stroke="#b6b6b6"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine2373" x1="-9" y1="0" x2="51" y2="0" stroke-dasharray="0"
                                            stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG2374" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG2375" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG2383" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG2384" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG2385" class="apexcharts-point-annotations"></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(44, 168, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- clients details section end -->

@endsection
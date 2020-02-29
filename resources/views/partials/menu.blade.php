<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/years*') ? 'menu-open' : '' }} {{ request()->is('admin/species*') ? 'menu-open' : '' }} {{ request()->is('admin/ngos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.grand.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           
                                <li class="nav-item">
                                    <a href="{{ route("admin.years.index") }}" class="nav-link {{ request()->is('admin/years') || request()->is('admin/years/*') ? 'active' : '' }}">
                                       <i class="far fa-calendar"></i>
                                        <p>
                                            <span>{{ trans('cruds.year.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            
                                <li class="nav-item">
                                    <a href="{{ route("admin.species.index") }}" class="nav-link {{ request()->is('admin/species') || request()->is('admin/species/*') ? 'active' : '' }}">
                                        <i class="fas fa-fish"></i>
                                        <p>
                                            <span>{{ trans('cruds.species.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                          
                                <li class="nav-item">
                                    <a href="{{ route("admin.ngos.index") }}" class="nav-link {{ request()->is('admin/ngos') || request()->is('admin/ngos/*') ? 'active' : '' }}">
                                        <i class="far fa-building"></i>
                                        <p>
                                            <span>{{ trans('cruds.ngo.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                           
                        </ul>
                    </li>
           
                
                    <li class="nav-item has-treeview {{ request()->is('admin/content-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/content-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/content-pages*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.contentManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-folder">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tags">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentTag.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.contentPage.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                         
                        </ul>
                    </li>
             
                    <li class="nav-item has-treeview {{ request()->is('admin/exhibation-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/years*') ? 'menu-open' : '' }} {{ request()->is('admin/exhibition-posts*') ? 'menu-open' : '' }} {{ request()->is('admin/exhibition-galleries*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.exhibitation.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                                <li class="nav-item">
                                    <a href="{{ route("admin.exhibation-categories.index") }}" class="nav-link {{ request()->is('admin/exhibation-categories') || request()->is('admin/exhibation-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.exhibationCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                        
                                <li class="nav-item">
                                    <a href="{{ route("admin.years.index") }}" class="nav-link {{ request()->is('admin/years') || request()->is('admin/years/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.year.title') }}</span>
                                        </p>
                                    </a>
                                </li>
               
                                <li class="nav-item">
                                    <a href="{{ route("admin.exhibition-posts.index") }}" class="nav-link {{ request()->is('admin/exhibition-posts') || request()->is('admin/exhibition-posts/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.exhibitionPost.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            
                                <li class="nav-item">
                                    <a href="{{ route("admin.exhibition-galleries.index") }}" class="nav-link {{ request()->is('admin/exhibition-galleries') || request()->is('admin/exhibition-galleries/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.exhibitionGallery.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                      
                        </ul>
                    </li>
             
                <li class="nav-item">
                    <a href="{{ route("admin.pages.index") }}" class="nav-link {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                            <span>{{ trans('cruds.page.title') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.galleries.index") }}" class="nav-link {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-images">

                        </i>
                        <span>{{ trans('cruds.gallery.title') }}</span>
                    </a>
                </li>
           
                <li class="nav-item">
                    <a href="{{ route("admin.media.index") }}" class="nav-link {{ request()->is('admin/media') || request()->is('admin/media/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-images">

                        </i>
                        <span>{{ trans('cruds.media.title') }}</span>
                    </a>
                </li>
               
           
                <li class="nav-item">
                    <a href="{{ route("admin.digital-brochures.index") }}" class="nav-link {{ request()->is('admin/digital-brochures') || request()->is('admin/digital-brochures/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-file-pdf">

                        </i>
                        <span>{{ trans('cruds.digitalBrochure.title') }}</span>
                    </a>
                </li>
            
                <li class="nav-item">
                    <a href="{{ route("admin.advisors.index") }}" class="nav-link {{ request()->is('admin/advisors') || request()->is('admin/advisors/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user">

                        </i>
                        <span>{{ trans('cruds.advisor.title') }}/who we are</span>
                    </a>
                </li>
        
                
                <li class="nav-item">
                    <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-sliders-h"></i>
                        <span>{{ trans('cruds.slider.title') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/laravel-filemanager") }}" class="nav-link {{ request()->is('admin/laravel-filemanager ') || request()->is('admin/laravel-filemanager /*') ? 'active' : '' }}">
                        <i class="fas fa-tools"></i>
                        <span>Filemanager</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/categories") }}"
                        class="nav-link {{ request()->is('admin/categories ') || request()->is('admin/categories /*') ? 'active' : '' }}">
                        <i class="fas fa-tools"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("admin/maps") }}"
                        class="nav-link {{ request()->is('admin/maps ') || request()->is('admin/maps /*') ? 'active' : '' }}">
                        <i class="fas fa-tools"></i>
                        <span>Maps</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url("setting") }}" class="nav-link {{ request()->is('admin/setting ') || request()->is('admin/setting /*') ? 'active' : '' }}">
                        <i class="fas fa-tools"></i>
                        <span>SETTING</span>
                    </a>
                </li>
                
                <li class="nav-item has-treeview {{ request()->is('admin/product-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/product-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/products*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-shopping-cart">
                
                        </i>
                        <p>
                            <span>{{ trans('cruds.productManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        <li class="nav-item">
                            <a href="{{ route("admin.product-categories.index") }}"
                                class="nav-link {{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-folder">
                
                                </i>
                                <p>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>
                                </p>
                            </a>
                        </li>
                      
                        <li class="nav-item">
                            <a href="{{ route("admin.product-tags.index") }}"
                                class="nav-link {{ request()->is('admin/product-tags') || request()->is('admin/product-tags/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-folder">
                
                                </i>
                                <p>
                                    <span>{{ trans('cruds.productTag.title') }}</span>
                                </p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route("admin.products.index") }}"
                                class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-shopping-cart">
                
                                </i>
                                <p>
                                    <span>{{ trans('cruds.product.title') }}</span>
                                </p>
                            </a>
                        </li>
                      
                    </ul>
                </li>
           
          
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
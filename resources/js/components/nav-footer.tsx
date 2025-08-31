import { SidebarGroup, SidebarGroupContent, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { SharedData, type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { type ComponentPropsWithoutRef } from 'react';

export function NavFooter({ items, className, ...props }: ComponentPropsWithoutRef<typeof SidebarGroup> & { items: NavItem[]; }) {
    const userRoles = usePage<SharedData>().props.auth.roles;
    const page = usePage();
    return (
        <SidebarGroup {...props} className={`group-data-[collapsible=icon]:p-0 ${className || ''}`}>
            <SidebarGroupContent>
                <SidebarMenu>
                    {items.filter((item) =>
                        (item.role && userRoles.includes(item.role)) || userRoles.includes('ADMIN')).map((item) => (
                            <SidebarMenuItem key={item.title}>
                                <SidebarMenuButton
                                    asChild
                                    isActive={page.url.startsWith(item.href)}
                                    className="text-neutral-600 hover:text-neutral-800 dark:text-neutral-300 dark:hover:text-neutral-100"
                                >
                                    <Link href={item.href} prefetch preserveScroll>
                                        {item.icon && <item.icon />}
                                        <span>{item.title}</span>
                                    </Link>
                                </SidebarMenuButton>
                            </SidebarMenuItem>
                        ))}
                </SidebarMenu>
            </SidebarGroupContent>
        </SidebarGroup>
    );
}

import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { SharedData, type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/react';

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const page = usePage();
    const userRoles = usePage<SharedData>().props.auth.roles;
    return (
        <SidebarGroup className="px-2 py-0">
            <SidebarGroupLabel>Sistema</SidebarGroupLabel>
            <SidebarMenu>
                {items.filter((item) =>
                    (item.role && userRoles.includes(item.role)) || userRoles.includes('ADMIN')
                ).map((item) => (
                    <SidebarMenuItem key={item.title}>
                        <SidebarMenuButton asChild isActive={page.url.startsWith(item.href)} tooltip={{ children: item.title }}>
                            <Link href={item.href} prefetch preserveScroll>
                                {item.icon && <item.icon />}
                                <span>{item.title}</span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                ))}
            </SidebarMenu>
        </SidebarGroup>
    );
}

import React from 'react';
import { Navbar, TextInput, Code, ScrollArea, Text, Group } from '@mantine/core';
import { IconSearch } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function NavbarSearch() {
  const { version, mainLinks, userLinks } = useComponent();
  const [search, setSearch] = React.useState('');
  const [active, setActive] = React.useState(mainLinks[0]?.label);

  // Filter links based on search
  const filteredLinks = mainLinks.filter(link => 
    link.label.toLowerCase().includes(search.toLowerCase())
  );

  return (
    <Navbar height="100vh" width={{ base: 300 }} p="md">
      <Navbar.Section>
        <Group className="pl-xs pb-lg border-b border-gray-200" justify="space-between">
          <Text fw="bold" size="xl">Logo</Text>
          <Code fw={700}>{version}</Code>
        </Group>
      </Navbar.Section>

      <TextInput
        placeholder="Search"
        size="xs"
        icon={<IconSearch size="0.8rem" stroke={1.5} />}
        value={search}
        onChange={(e) => setSearch(e.currentTarget.value)}
        className="my-md"
      />

      <Navbar.Section grow component={ScrollArea} mx="-xs" px="xs">
        <div className="py-md">
          {filteredLinks.map((link) => {
            const IconComponent = Icons[`Icon${link.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
            
            return (
              <a
                className={`
                  flex items-center text-sm font-medium p-xs rounded-sm
                  hover:bg-gray-100 cursor-pointer mb-2
                  ${active === link.label ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
                `}
                key={link.label}
                onClick={() => setActive(link.label)}
              >
                <IconComponent size="1.25rem" className="mr-3" />
                <span>{link.label}</span>
              </a>
            );
          })}
        </div>
      </Navbar.Section>

      <Navbar.Section className="border-t border-gray-200">
        <div className="pt-md">
          {userLinks.map((link) => {
            const IconComponent = Icons[`Icon${link.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
            
            return (
              <a
                className="
                  flex items-center text-sm font-medium p-xs rounded-sm
                  hover:bg-gray-100 cursor-pointer mb-2 text-gray-700
                "
                key={link.label}
              >
                <IconComponent size="1.25rem" className="mr-3" />
                <span>{link.label}</span>
              </a>
            );
          })}
        </div>
      </Navbar.Section>
    </Navbar>
  );
}

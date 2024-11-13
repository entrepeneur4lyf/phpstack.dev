import React from 'react';
import { Navbar, Text, Group, Collapse, UnstyledButton } from '@mantine/core';
import { IconChevronRight } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function LinksGroup({ data, activeLink, onLinkClick }) {
  const [opened, setOpened] = React.useState(false);
  const { label, icon, links } = data;
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  const items = (links || []).map((link) => (
    <UnstyledButton
      component="a"
      className={`
        block pl-8 py-2 text-sm hover:bg-gray-100 rounded-sm
        ${activeLink === link.label ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
      `}
      key={link.label}
      onClick={(event) => {
        event.preventDefault();
        onLinkClick(link.label);
      }}
    >
      {link.label}
    </UnstyledButton>
  ));

  return (
    <div>
      <UnstyledButton
        onClick={() => setOpened((o) => !o)}
        className="w-full p-xs hover:bg-gray-100 rounded-sm"
      >
        <Group justify="space-between" gap={0}>
          <Group gap="xs">
            <IconComponent size="1.25rem" />
            <Text size="sm">{label}</Text>
          </Group>
          {links && (
            <IconChevronRight
              size="1rem"
              className={`transform transition-transform ${opened ? 'rotate-90' : ''}`}
            />
          )}
        </Group>
      </UnstyledButton>
      {links && <Collapse in={opened}>{items}</Collapse>}
    </div>
  );
}

export default function NavbarLinksGroup() {
  const { data } = useComponent();
  const [active, setActive] = React.useState('');

  return (
    <Navbar height="100vh" width={{ base: 300 }} p="md">
      <Navbar.Section>
        <Text fw="bold" size="xl" className="pl-xs pb-lg">Logo</Text>
      </Navbar.Section>

      <Navbar.Section grow>
        {data.map((item) => (
          <div key={item.label} className="mb-4">
            <LinksGroup
              data={item}
              activeLink={active}
              onLinkClick={setActive}
            />
          </div>
        ))}
      </Navbar.Section>
    </Navbar>
  );
}

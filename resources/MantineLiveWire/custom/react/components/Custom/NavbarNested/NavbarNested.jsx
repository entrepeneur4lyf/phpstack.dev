import React from 'react';
import { Navbar, Text, Group, Collapse, UnstyledButton } from '@mantine/core';
import { IconChevronRight } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function NavbarLink({ label, icon, active, onClick }) {
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <UnstyledButton
      onClick={onClick}
      className={`
        flex items-center text-sm font-medium p-xs rounded-sm w-full
        hover:bg-gray-100 cursor-pointer mb-2
        ${active ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
      `}
    >
      <IconComponent size="1.25rem" className="mr-3" />
      <span>{label}</span>
    </UnstyledButton>
  );
}

function NavbarSection({ section, activeLink, onLinkClick }) {
  const [opened, setOpened] = React.useState(true);
  const IconComponent = Icons[`Icon${section.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <div className="mb-4">
      <UnstyledButton
        onClick={() => setOpened((o) => !o)}
        className="flex items-center justify-between w-full p-xs hover:bg-gray-100 rounded-sm"
      >
        <Group>
          <IconComponent size="1.25rem" />
          <Text size="sm" fw={500}>{section.label}</Text>
        </Group>
        <IconChevronRight
          size="1rem"
          className={`transform transition-transform ${opened ? 'rotate-90' : ''}`}
        />
      </UnstyledButton>

      <Collapse in={opened}>
        <div className="pl-8 mt-2">
          {section.links.map((link) => (
            <NavbarLink
              key={link.label}
              {...link}
              active={activeLink === link.label}
              onClick={() => onLinkClick(link.label)}
            />
          ))}
        </div>
      </Collapse>
    </div>
  );
}

export default function NavbarNested() {
  const { sections } = useComponent();
  const [active, setActive] = React.useState(sections[0]?.links[0]?.label);

  return (
    <Navbar height="100vh" width={{ base: 300 }} p="md">
      <Navbar.Section>
        <Text fw="bold" size="xl" className="pl-xs pb-lg">Logo</Text>
      </Navbar.Section>

      <Navbar.Section grow>
        {sections.map((section) => (
          <NavbarSection
            key={section.label}
            section={section}
            activeLink={active}
            onLinkClick={setActive}
          />
        ))}
      </Navbar.Section>
    </Navbar>
  );
}

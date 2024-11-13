import React from 'react';
import { Navbar, Text, UnstyledButton, Collapse } from '@mantine/core';
import { IconChevronRight } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function NavbarSection({ section, activeLink, onLinkClick }) {
  const [opened, setOpened] = React.useState(true);
  const { label, icon, links } = section;
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <div className="mb-4">
      <UnstyledButton
        onClick={() => setOpened((o) => !o)}
        className="w-full p-xs hover:bg-gray-100 rounded-sm"
      >
        <div className="flex items-center justify-between">
          <div className="flex items-center">
            <IconComponent size="1.25rem" className="mr-3" />
            <Text size="sm">{label}</Text>
          </div>
          <IconChevronRight
            size="1rem"
            className={`transform transition-transform ${opened ? 'rotate-90' : ''}`}
          />
        </div>
      </UnstyledButton>

      <Collapse in={opened}>
        <div className="pl-8 mt-2">
          {links.map((link) => {
            const LinkIconComponent = Icons[`Icon${link.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
            
            return (
              <UnstyledButton
                key={link.label}
                className={`
                  flex items-center text-sm font-medium p-xs rounded-sm w-full
                  hover:bg-gray-100 cursor-pointer mb-2
                  ${activeLink === link.label ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
                `}
                onClick={() => onLinkClick(link.label)}
              >
                <LinkIconComponent size="1rem" className="mr-3" />
                <span>{link.label}</span>
              </UnstyledButton>
            );
          })}
        </div>
      </Collapse>
    </div>
  );
}

export default function NavbarCollapse() {
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

import React from 'react';
import { Navbar, Text, Group, Divider } from '@mantine/core';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function NavbarLink({ icon, label, active, onClick }) {
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <a
      className={`
        flex items-center text-sm font-medium p-xs rounded-sm
        hover:bg-gray-100 cursor-pointer mb-2
        ${active ? 'bg-blue-50 text-blue-600' : 'text-gray-700'}
      `}
      onClick={() => onClick(label)}
    >
      <IconComponent size="1.25rem" className="mr-3" />
      <span>{label}</span>
    </a>
  );
}

export default function NavbarDivided() {
  const { sections } = useComponent();
  const [active, setActive] = React.useState(sections[0]?.links[0]?.label);

  return (
    <Navbar height="100vh" width={{ base: 300 }} p="md">
      <Navbar.Section>
        <Text fw="bold" size="xl" className="pl-xs pb-lg">Logo</Text>
      </Navbar.Section>

      {sections.map((section, index) => (
        <React.Fragment key={section.label}>
          {index > 0 && <Divider my="sm" />}
          
          <Navbar.Section>
            <Group className="pl-xs pb-2">
              <Text size="xs" fw={500} c="dimmed">{section.label}</Text>
            </Group>

            {section.links.map((link) => (
              <NavbarLink
                key={link.label}
                {...link}
                active={active === link.label}
                onClick={setActive}
              />
            ))}
          </Navbar.Section>
        </React.Fragment>
      ))}
    </Navbar>
  );
}

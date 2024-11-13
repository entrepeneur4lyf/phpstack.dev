import React from 'react';
import { Navbar, SegmentedControl, Text, ScrollArea } from '@mantine/core';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function NavbarSegmented() {
  const { sections } = useComponent();
  const [section, setSection] = React.useState(sections[0]?.value);
  const [active, setActive] = React.useState(sections[0]?.links[0]?.label);

  // Get current section's links
  const currentSection = sections.find(s => s.value === section);

  return (
    <Navbar height="100vh" width={{ base: 300 }} p="md">
      <Navbar.Section>
        <Text fw="bold" size="xl" className="pl-xs pb-lg">Logo</Text>
      </Navbar.Section>

      <Navbar.Section>
        <SegmentedControl
          value={section}
          onChange={setSection}
          transitionTimingFunction="ease"
          fullWidth
          data={sections.map(section => ({
            label: section.label,
            value: section.value,
          }))}
        />
      </Navbar.Section>

      <Navbar.Section grow component={ScrollArea} mx="-xs" px="xs">
        <div className="py-md">
          {currentSection?.links.map((link) => {
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
          <Text size="xs" fw={500} className="pb-2 text-gray-500">
            {currentSection?.description}
          </Text>
        </div>
      </Navbar.Section>
    </Navbar>
  );
}

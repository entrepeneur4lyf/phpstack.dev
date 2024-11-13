import React from 'react';
import { Navbar, Text, ScrollArea, Button, Divider } from '@mantine/core';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

function MainLink({ icon, label, active, onClick }) {
  const IconComponent = Icons[`Icon${icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];

  return (
    <Button
      variant={active ? 'light' : 'subtle'}
      className="w-full justify-start"
      leftSection={<IconComponent size="1rem" />}
      onClick={() => onClick(label)}
    >
      {label}
    </Button>
  );
}

export default function NavbarDouble() {
  const { mainLinks, content } = useComponent();
  const [active, setActive] = React.useState(mainLinks[0]?.label);

  // Get current section's content
  const currentContent = content.find(c => c.section === active);

  return (
    <Navbar height="100vh" width={{ sm: 500 }}>
      <Navbar.Section>
        <Text fw="bold" size="xl" className="p-md">Logo</Text>
      </Navbar.Section>

      <Divider />

      <div className="flex h-[calc(100vh-60px)]">
        <Navbar.Section className="p-md w-[200px] border-r border-gray-200">
          <div className="space-y-2">
            {mainLinks.map((link) => (
              <MainLink
                key={link.label}
                {...link}
                active={active === link.label}
                onClick={setActive}
              />
            ))}
          </div>
        </Navbar.Section>

        <Navbar.Section grow component={ScrollArea} className="p-md w-[300px]">
          {currentContent && (
            <div>
              <Text fw={500} size="lg" mb="xs">{currentContent.title}</Text>
              <Text size="sm" c="dimmed" mb="md">{currentContent.description}</Text>
              
              <div className="space-y-2">
                {currentContent.items.map((item, index) => (
                  <div
                    key={index}
                    className="p-3 rounded-md hover:bg-gray-100 cursor-pointer"
                  >
                    <Text size="sm" fw={500}>{item.title}</Text>
                    <Text size="xs" c="dimmed">{item.description}</Text>
                  </div>
                ))}
              </div>
            </div>
          )}
        </Navbar.Section>
      </div>
    </Navbar>
  );
}

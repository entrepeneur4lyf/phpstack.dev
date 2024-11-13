import React from 'react';
import { Container, Group, Burger, Text, Tabs } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function HeaderTabs() {
  const { appName, mainLinks, userLinks } = useComponent();
  const [opened, setOpened] = React.useState(false);

  return (
    <Container size="md">
      <div className="flex justify-between items-center h-16">
        <Text fw="bold" size="xl">{appName}</Text>

        {/* Show on desktop, hide on mobile */}
        <Group gap={5} visibleFrom="sm">
          {userLinks.map((link) => (
            <Text
              key={link.label}
              className="cursor-pointer hover:underline"
            >
              {link.label}
            </Text>
          ))}
        </Group>

        {/* Show on mobile, hide on desktop */}
        <Burger
          opened={opened}
          onClick={() => setOpened((o) => !o)}
          hiddenFrom="sm"
          size="sm"
        />
      </div>

      {/* Tabs - show on desktop, hide on mobile */}
      <div className="hidden sm:block">
        <Tabs defaultValue={mainLinks[0]?.label} variant="outline">
          <Tabs.List>
            {mainLinks.map((link) => (
              <Tabs.Tab
                key={link.label}
                value={link.label}
                leftSection={link.icon && <link.icon size="1rem" />}
              >
                {link.label}
              </Tabs.Tab>
            ))}
          </Tabs.List>
        </Tabs>
      </div>

      {/* Mobile menu */}
      {opened && (
        <div className="sm:hidden border-t border-gray-200">
          <div className="py-4 space-y-4">
            {mainLinks.map((link) => (
              <Text
                key={link.label}
                className="block cursor-pointer hover:underline mb-2"
              >
                {link.label}
              </Text>
            ))}

            <div className="border-t border-gray-200 pt-4">
              {userLinks.map((link) => (
                <Text
                  key={link.label}
                  className="block cursor-pointer hover:underline mb-2"
                >
                  {link.label}
                </Text>
              ))}
            </div>
          </div>
        </div>
      )}
    </Container>
  );
}

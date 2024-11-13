import React from 'react';
import { Container, Group, Burger, Text, Menu } from '@mantine/core';
import { IconChevronDown } from '@tabler/icons-react';
import * as Icons from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeaderMenu() {
  const { appName, mainLinks, menuItems, userLinks } = useComponent();
  const [opened, setOpened] = React.useState(false);

  return (
    <Container size="md">
      <div className="flex justify-between items-center h-16">
        <Text fw="bold" size="xl">{appName}</Text>

        {/* Show on desktop, hide on mobile */}
        <Group gap={5} visibleFrom="sm">
          {mainLinks.map((link) => (
            <Text
              key={link.label}
              className="cursor-pointer hover:underline"
            >
              {link.label}
            </Text>
          ))}

          <Menu trigger="hover" openDelay={100} closeDelay={200}>
            <Menu.Target>
              <div className="flex items-center cursor-pointer">
                <Text>Features</Text>
                <IconChevronDown size="1rem" className="ml-2" />
              </div>
            </Menu.Target>

            <Menu.Dropdown>
              {menuItems.map((item) => {
                const IconComponent = Icons[`Icon${item.icon.split('-').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join('')}`];
                
                return (
                  <Menu.Item
                    key={item.label}
                    leftSection={<IconComponent size="1rem" />}
                  >
                    {item.label}
                  </Menu.Item>
                );
              })}
            </Menu.Dropdown>
          </Menu>

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
              <Text fw={500} className="mb-2">Features</Text>
              {menuItems.map((item) => (
                <Text
                  key={item.label}
                  className="block cursor-pointer hover:underline mb-2 ml-4"
                >
                  {item.label}
                </Text>
              ))}
            </div>

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

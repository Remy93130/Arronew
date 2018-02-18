#include <SPI.h>
#include <Ethernet.h>

byte mac[] = {0x90, 0xA2, 0xDA, 0x0E, 0xA5, ox7E};
IPAdress ip(192, 168, 0, 143);
EthernetClient client;
char serveur[] = "rm93130.altervista.org";

void setup()
{
	//Code pour les capteurs
}

void loop()
{
	char MAC = 0;
	char connection = 0;

	MAC = Ethernet.begin(mac);

	if (!MAC)
	{
		Ethernet.begin(mac, ip);
	}
	delay(5000);
	connection = client.conenct(serveur, 80);

	if (connection)
	{
		client.print("GET /data.php?temperature=");
		client.print(temperature);
		client.print("&niveauEau=");
		client.print(niveauEau);
		client.print("&sol1=");
		client.print(humiditeSol1);
		client.print("&sol2=");
		client.print(humiditeSol2);
		client.print("&sol3");
		client.print(humiditeSol3);
		client.print("&humiditeSol4");
		client.print(humiditeSol4);
		client.print(" HTTP/1.1");
	}
}
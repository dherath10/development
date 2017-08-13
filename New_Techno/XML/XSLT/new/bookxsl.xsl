<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <body>
  <h2>My CD Collection</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
	  <th>ID</th>
	  <th>Category</th>
      <th>Title</th>
      <th>Artist</th>
	  <th>Authors</th>
    </tr>
    <xsl:for-each select="bookStore/book">
    <tr>
	  <td><xsl:value-of select="@ID"/></td>
	  <td><xsl:value-of select="@cat"/></td>
      <td><xsl:value-of select="bookTitle"/></td>
      <td><xsl:value-of select="ISBN"/></td>
	  <td>
	 	<ul type="square">
	  <xsl:for-each select="author">
	 
		<li>
	  <xsl:value-of select="fullname"/>
	  </li>
	  </xsl:for-each>
	  </ul>
	  </td>
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
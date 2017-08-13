<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
<h2 align="center">School Information</h2>
<table border="1" align="center">
	<tr bgcolor="#00CC33">
    	<td>Name</td>
    	<td>No</td>
    	<td>Street</td>
    	<td>City</td>
    	<td>Country</td>
    </tr>
	<xsl:for-each select="school">
    <tr>
    	<td><b><xsl:value-of select="name" /></b></td>
    	<td><xsl:value-of select="no" /></td>
    	<td><xsl:value-of select="street" /></td>
    	<td><xsl:value-of select="city" /></td>
    	<td><xsl:value-of select="country" /></td>
    </tr>
    </xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
